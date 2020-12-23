<?php
	//equipamentos por pagina
	$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina = 8;
	$equipamentos = Painel::selectAll('equipamentos',($paginaAtual - 1) * $porPagina,$porPagina);

	//excluir Registro
	if (isset($_GET['excluir'])) {
		$idExclur = intval($_GET['excluir']);
		Painel::deletarRegistro('equipamentos',$idExclur);
		Painel::redirect(INCLUDE_PATH_PAINEL.'equipamentos');

	}else if(isset($_GET['order']) && isset($_GET['id'])) {
		Painel::orderItem('equipamentos',$_GET['order'],$_GET['id']);
		Painel::redirect(INCLUDE_PATH_PAINEL.'equipamentos');	
	}


?>

<div class="box-content left">

	<h2><i class="fas fa-desktop"></i> Equipamentos Cadastrados</h2>

	<div class="whaper-table">
		<table>
			<tr>
				<td>marca</td>
				<td>modelo</td>
				<td>tombamento</td>
				<td>serial</td>
				<td>#</td>
				<td>#</td>
				<td>#</td>
				<td>#</td>
			</tr>

			<?php 
				foreach ($equipamentos as $key => $value) {
			?>
				<tr>
					<!--conteudo-->
					<td><?php echo $value['marca']; ?></td>
					<td><?php echo $value['modelo']; ?></td>
					<td><?php echo $value['tombamento']; ?></td>
					<td><?php echo $value['serial']; ?></td>
					<td><a class="btn edit" href="<?php INCLUDE_PATH_PAINEL; ?>editar-equipamentos?id=<?php echo $value['id']; ?>"><i class="fa fa-pencil-alt"></i> Editar</a></td>
					<td><a actionBtn="delete" class="btn delete" href="<?php INCLUDE_PATH_PAINEL; ?>equipamentos?excluir=<?php echo $value['id']; ?>"><i class="fa fa-times"></i> Deletar</a></td>
					<td><a class="btn order" href="<?php INCLUDE_PATH_PAINEL ?>equipamentos?order=up&id=<?php echo $value['id']; ?>"><i class="fas fa-arrow-up"></i></a></td>
					<td><a class="btn order" href="<?php INCLUDE_PATH_PAINEL ?>equipamentos?order=down&id=<?php echo $value['id']; ?>"><i class="fas fa-arrow-down"></i></a></td>
				</tr>

			<?php } ?>
		</table>
	</div><!--whaper-table-->

	<div class="paginacao">
		<?php
							//ceil vai fazer com q se o valor for float vai arredondar para cima
			$totalPaginas = ceil(count(Painel::selectAll('equipamentos')) / $porPagina);


			for($i = 1;$i <= $totalPaginas; $i++){
				if ($i == $paginaAtual) 
					echo '<a class="page-select" href="'.INCLUDE_PATH_PAINEL.'equipamentos?pagina='.$i.'">'.$i.'</a>';
				else
					echo '<a href="'.INCLUDE_PATH_PAINEL.'equipamentos?pagina='.$i.'">'.$i.'</a>';
				
			}

		?>
	</div><!--paginacao-->

</div><!--box-content-->

<div class="clear"></div>