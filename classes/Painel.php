
<?php

	class Painel{

		public static function logado(){
			return isset($_SESSION['login']) ? true : false;
		}


		public static function loggout(){
			setcookie('Lembrar',true,time()-3600,'/');
			session_destroy();
			header('Location: '.INCLUDE_PATH_PAINEL);
		}

		public static function carregarPagina(){

			if (isset($_GET['url'])) {
				
				$url = explode('/', $_GET['url']);
				
				if (file_exists('pages/'.$url[0].'.php')) {

					include('pages/'.$url[0].'.php');

				}else{
					//pagina nao existe direcionamento para painel
					header('Location: '.INCLUDE_PATH_PAINEL);			
				}

			}else{

				include('pages/home.php');

			}

		}

		public static function selectAll($tabela,$start = null,$end = null){ 
			if ($start == null and $end == null) 
				$sql = Mysql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY order_id ASC");
			else
				$sql = Mysql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY order_id ASC LIMIT $start,$end");
			
			$sql->execute();
			return $sql->fetchAll();
			
		}

		public static function redirect($url){
			echo '<script>location.href="'.$url.'" </script>';
			die();
		}

		public static function deletarRegistro($tabela,$idExcluir){
			$sql = Mysql::conectar()->prepare("DELETE FROM `$tabela` WHERE id = ?");
			$sql->execute(array($idExcluir));
		}

		public static function alertSuccess($tipo,$mensagem){
			if ($tipo == 'sucesso') {
				echo "<div class='box-alert sucesso'><i class='fas fa-check'></i> ".$mensagem."</div>";
			}else if ($tipo == 'erro') {
				echo "<div class='box-alert erro'><i class='fas fa-times'></i>".$mensagem."</div>";
			}
		}

		public static function insert($arr){
			$certo = true;			
			$nome_tabela = $arr['nome_tabela'];
			$query = "INSERT INTO `$nome_tabela` VALUES(null";

			foreach ($arr as $key => $value) {
				$nome = $key;
				$valor = $value;
				if ($nome == 'acao' or $value == $arr['nome_tabela']) 
					continue;	
				$query.=",?";
				$parametros[] = $value;
			}

			$query.=")";

			if ($certo == true) {
				$sql = Mysql::conectar()->prepare($query);
				$sql->execute($parametros);
				$lastID = Mysql::conectar()->lastInsertId();
				$sql = Mysql::conectar()->prepare("UPDATE `$nome_tabela` SET order_id = ? WHERE id = $lastID");
				$sql->execute(array($lastID));
				//lastInsertId() funçao do PDO que pega o ultimo id
			}
			return $certo;
		}//insert

		public static function select($tabela,$query = '',$arr = ''){
			if($query != ''){
				$sql = Mysql::conectar()->prepare("SELECT * FROM `$tabela` WHERE $query");
				$sql->execute($arr);
			}else{
				$sql = Mysql::conectar()->prepare("SELECT * FROM `$tabela`");
				$sql->execute();
			}
			return $sql->fetch();
		}//select

		public static function update($arr,$single = false){
			$certo = true;
			$primeiro = false;
			$nome_tabela = $arr['nome_tabela'];
			$query = "UPDATE `$nome_tabela` SET ";

			foreach ($arr as $key => $value) {
				$nome = $key;
				$valor = $value;
				if ($nome == 'acao' || $nome == 'nome_tabela' || $nome == 'id') 
					continue;
				if ($value == '') {
				 	$certo = false;
				 	break;	
				}
				if ($primeiro == false) {
					$primeiro = true;
					$query.="$nome = ?";
				}else{
					$query.=",$nome = ?";
				}
				$parametros[] = $value;

			}
			
			if($certo == true){
				if($single == false){
					$parametros[] = $arr['id'];
					$sql = MySql::conectar()->prepare($query.' WHERE id=?');
					$sql->execute($parametros);
				}else{
					$sql = MySql::conectar()->prepare($query);
					$sql->execute($parametros);
				}
			}
			
			return $certo;
		}//update

		public static function orderItem($tabela,$order,$id){
			if ($order == 'up') {
				$itemAtual = Painel::select($tabela,'id=?',array($id));
				$order_id = $itemAtual['order_id'];
				$itemBefore = Mysql::conectar()->prepare("SELECT * FROM `$tabela` WHERE order_id < $order_id ORDER BY order_id DESC LIMIT 1");
				$itemBefore->execute();
				if ($itemBefore->rowCount() == 0) 
					return;
				$itemBefore= $itemBefore->fetch();				
				Painel::update(array('nome_tabela'=>$tabela,'id'=>$itemBefore['id'],'order_id'=>$itemAtual['order_id']));
				Painel::update(array('nome_tabela'=>$tabela,'id'=>$itemAtual['id'],'order_id'=>$itemBefore['order_id']));
			}else if ($order == 'down') {
				$itemAtual = Painel::select($tabela,'id=?',array($id));
				$order_id = $itemAtual['order_id'];
				$itemAfter = Mysql::conectar()->prepare("SELECT * FROM `$tabela` WHERE order_id > $order_id ORDER BY order_id ASC LIMIT 1");
				$itemAfter->execute();
				if ($itemAfter->rowCount() == 0) 
					return;
				$itemAfter= $itemAfter->fetch();				
				Painel::update(array('nome_tabela'=>$tabela,'id'=>$itemAfter['id'],'order_id'=>$itemAtual['order_id']));
				Painel::update(array('nome_tabela'=>$tabela,'id'=>$itemAtual['id'],'order_id'=>$itemAfter['order_id']));
			}
		}//orderItem

	} 


?>
