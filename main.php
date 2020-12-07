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



		</div>
		<div class="clear"></div>
	</header>

<?php
	Painel::carregarPagina();
?>

</body>
</html>