
<?php
		
	$pesquisa = '';	

	if (isset($_GET['excluir'])) {
		$idExclur = intval($_GET['excluir']);
		Painel::deletarRegistro('equipamentos',$idExclur);
		Painel::redirect(INCLUDE_PATH_PAINEL.'equipamentos');
	}
	
	if (isset($_POST['enviar'])) {

		$tombamento = $_POST['tombamento'];
		$serial = $_POST['serial'];

		if ($tombamento == '') {
			
			$sql = Mysql::conectar()->prepare("SELECT * FROM `equipamentos` WHERE `serial` = ?");
			$sql->execute(array($serial));
			$pesquisa = $sql->fetchAll();;

		}elseif ($serial == '') {
			$sql = Mysql::conectar()->prepare("SELECT * FROM `equipamentos` WHERE tombamento = ?");
			$sql->execute(array($tombamento));
			$pesquisa = $sql->fetchAll();
		}else{
			Painel::alertAccess('erro','O Equipamento nao foi localizado');
		}
	}

?>

	

<div class="box-content left">

	<h2><i class="fas fa-search"></i> Pesquisar Equipamento</h2>

	<form method="post">

		<div class="campo-preenchimento w40">
			<p>Tombamento</p>
			<input type="text" name="tombamento">
		</div>

		<div class="campo-preenchimento w40">
			<p>Serial</p>
			<input type="text" name="serial">
		</div>

		<div class="campo-preenchimento">
			<input type="submit" name="enviar" value="Pesquisar">
		</div>
				
	</form>

</div>


<?php if($pesquisa != ''){ ?>
	<div class="whaper-table left w100">
		
		<table>

			<tr>
				<td>Marca</td>
				<td>Modelo</td>
				<td>Tombamento</td>
				<td>Serial</td>
				<td>#</td>
				<td>#</td>	

			</tr>

			<?php foreach($pesquisa as $key => $value){ ?>
				<tr>
					<td><?php echo $value['marca']; ?></td>
					<td><?php echo $value['modelo']; ?></td>
					<td><?php echo $value['tombamento']; ?></td>
					<td><?php echo $value['serial']; ?></td>
					<td><a class="btn edit" href="<?php INCLUDE_PATH_PAINEL; ?>editar-equipamentos?id=<?php echo $value['id']; ?>"><i class="fa fa-pencil-alt"></i> Editar</a></td>
					<td><a actionBtn="delete" class="btn delete" href="<?php INCLUDE_PATH_PAINEL; ?>equipamentos?excluir=<?php echo $value['id']; ?>"><i class="fa fa-times"></i> Deletar</a></td>
				</tr>

			<?php } ?>

		</table>

	</div>

<?php } ?>