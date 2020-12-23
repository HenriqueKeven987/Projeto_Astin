
<?php

		if (isset($_POST['enviar'])) {

			$marca = $_POST['marca'];
			$modelo = $_POST['modelo'];
			$tombamento = $_POST['tombamento'];
			$serial = $_POST['serial'];

			if (Painel::insert($_POST)) {
				Painel::alertSuccess('sucesso','O Cadastro do Equipamento Foi Feito com Sucesso!');	
			}else{
				Painel::alertSuccess('erro','Ocorreu Algum Erro!');
			}		

		}

?>

	<div class="box-content left">

		<h2><i class="fas fa-desktop"></i> Cadastro de Equipamento</h2>

		<form method="post">
			
			<div class="campo-preenchimento">
				<p>Marca:</p>
				<input type="text" name="marca" required>
			</div>

			<div class="campo-preenchimento">
				<p>Modelo:</p>
				<input type="text" name="modelo" required>
			</div>

			<div class="campo-preenchimento">
				<p>Tombamento:</p>
				<input type="text" name="tombamento">
			</div>

			<div class="campo-preenchimento">
				<p>Serial:</p>
				<input type="text" name="serial">
			</div>

			<div class="campo-preenchimento">
				<input type="hidden" name="nome_tabela" value="equipamentos">
				<input type="submit" name="enviar" value="Cadastrar">
			</div>			

		</form>

	</div>

	<div class="clear"></div>