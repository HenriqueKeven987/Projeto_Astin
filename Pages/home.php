
<?php

		if (isset($_POST['enviar'])) {

			$marca = $_POST['marca'];
			$modelo = $_POST['modelo'];
			$tombamento = $_POST['tombamento'];
			$serial = $_POST['serial'];

			if ($tombamento == '') {
				$sql = Mysql::conectar()->prepare("INSERT INTO `equipamentos` VALUES (null,?,?,null,?)");
				$sql->execute(array($marca,$modelo,$serial));	
			}else if($serial == ''){
				$sql = Mysql::conectar()->prepare("INSERT INTO `equipamentos` VALUES (null,?,?,?,null)");
				$sql->execute(array($marca,$modelo,$tombamento));
			}else {
				$sql = Mysql::conectar()->prepare("INSERT INTO `equipamentos` VALUES (null,?,?,?,?)");
				$sql->execute(array($marca,$modelo,$tombamento,$serial));				
			}			

		}

?>

	<div class="box-content">

		<h2>Cadastro de Equipamento</h2>

		<form method="post">
			
			<div class="campo-preenchimento">
				<p>Marca:</p>
				<input type="text" name="marca" placeholder="EX:Positivo" required>
			</div>

			<div class="campo-preenchimento">
				<p>Modelo:</p>
				<input type="text" name="modelo" placeholder="EX:P17DRF" required>
			</div>

			<div class="campo-preenchimento">
				<p>Tombamento:</p>
				<input type="text" name="tombamento" placeholder="EX:2541254">
			</div>

			<div class="campo-preenchimento">
				<p>Serial:</p>
				<input type="text" name="serial" placeholder="EX:5PLTRF34">
			</div>

			<div class="campo-preenchimento">
				<input type="submit" name="enviar" value="Cadastrar">
			</div>			

		</form>

	</div>

	<div class="clear"></div>