
<?php 
	
	if (isset($_GET['id'])) {
					//pegando o id
		$id = intval($_GET['id']);
		$equipamentos = Painel::select('equipamentos','id = ?',array($id));		
	}else{
		Painel::alertSuccess('erro','Voce Precissa Passar o id');
		die();
	}	

?>


<div class="box-content left">

	<h2 class=""><i class="fas fa-user-edit"></i> Editar Equipamento</h2>
					
	<form method="post">

		<?php

			if (isset($_POST['acao'])) {

				$nome = $_POST['nome'];

				if (Painel::update($_POST)) {
					Painel::alertSuccess('sucesso','O Depoimento de '.$nome.' foi atualizado');
					$equipamentos = Painel::select('equipamentos','id = ?',array($id));		
				}else{
					Painel::alertSuccess('erro','Ocorreu algum Erro');
				}								
			
			}

		?>
	
		<div class="form-group">

			<p>Marca</p>
			<input type="text" name="marca" value="<?php echo $equipamentos['marca'];?>">

		</div><!--form-group-->

		<div class="form-group">

			<p>Modelo</p>
			<input type="text" name="modelo" value="<?php echo $equipamentos['modelo'];?>">			

		</div><!--form-group-->

		<div class="form-group">

			<p>Tombamento</p>
			<input type="text" name="tombamento" value="<?php echo $equipamentos['tombamento'];?>">

		</div><!--form-group-->

		<div class="form-group">

			<p>Serial</p>
			<input type="text" name="tombamento" value="<?php echo $equipamentos['serial'];?>">

		</div><!--form-group-->

		<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input type="hidden" name="nome_tabela" value="equipamentos">
			<input type="submit" name="acao" value="Atualizar!">

		</div><!--form-group-->

	</form>


</div><!--box-content-->