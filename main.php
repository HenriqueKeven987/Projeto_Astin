<?php
	
	if (isset($_GET['loggout'])) {
		Painel::loggout();
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Deposito Astin</title>
	<!--font awesome-->
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_PAINEL; ?>css/css/all.css">
	<!--stilo-->
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_PAINEL; ?>css/style.css">
	<!--Redimensionar-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>

	<header>
		<div class="center">

			<p>Sistema de Materias e Equipamentos</p>
		

			<div class="loggout">
				<a href="<?php echo INCLUDE_PATH_PAINEL;?>?loggout"><i class="fas fa-sign-out-alt"></i> Sair</a>
			</div>

			<div class="loggout">
				<a href="<?php echo INCLUDE_PATH_PAINEL?>pesquisa"><i class="fas fa-search"></i> Pesquisar</a>
			</div>

			<div class="loggout">
				<a href="<?php echo INCLUDE_PATH_PAINEL;?>equipamentos"><i class="fas fa-desktop"></i> Equipamentos</a>
			</div>

			<div class="loggout">
				<a href="<?php echo INCLUDE_PATH_PAINEL;?>cadastro"><i class="fas fa-file"></i> Cadastro</a>
			</div>	

			<div class="loggout">
				<a href="<?php echo INCLUDE_PATH_PAINEL;?>"><i class="fas fa-home"></i> Home</a>
			</div>				

		</div>
	</header>

	<div>

		<?php
			Painel::carregarPagina();
		?>

	</div>

	<script src="<?php echo INCLUDE_PATH_PAINEL?>js/script_desing.js"></script>

</body>
</html>