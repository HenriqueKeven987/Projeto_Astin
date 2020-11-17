<?php
	
	if (isset($_GET['loggout'])) {
		Painel::loggout();
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login Astin Deposito</title>
	<!--font awesome-->
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_PAINEL; ?>css/css/all.css">
	<!--stilo-->
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_PAINEL; ?>css/style.css">

</head>
<body>

	<header>
		<div class="center">
			<div class="loggout">
				<a href="<?php echo INCLUDE_PATH_PAINEL;?>?loggout"><i class="fas fa-sign-out-alt"></i></a>

			</div>

		</div>
		<div class="clear"></div>
	</header>

	<section class="cadastro-equipamento">

		<h2>Em Desenvolvimento!</h2>

	</section>
	<div class="clear"></div>


</body>
</html>