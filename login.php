<!DOCTYPE html>
<html>
<head>
	<title>Login Astin Deposito</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<!--font awesome-->
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_PAINEL;?>css/css/all.css">
	<!--stilo-->
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_PAINEL;?>css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:300,400,700" rel="stylesheet"/>
</head>
<body>

	<div class="box-login">
		
		<?php
			//login do usuario
			if (isset($_POST['acao'])) {
				$usuario = $_POST['usuario'];
				$senha = $_POST['senha'];
				$sql = Mysql::conectar()->prepare("SELECT * FROM `tb-admin.usuarios` WHERE usuario = ? AND senha = ?");
				$sql->execute(array($usuario,$senha));

				if ($sql->rowCount() == 1) {
					//logado com sucesso
					$_SESSION['login'] = true;
					$_SESSION['usuario'] = $usuario;
					$_SESSION['senha'] = $senha;
					//direcionamento para a pagina de cadastro
					header('Location: '.INCLUDE_PATH_PAINEL);
					die();
				}else{
					//login deu erro
					echo "<div class='box-erro'><i class='fas fa-times'></i> Usuario ou senha Incorretos!</div>";
				}
			}


		?>

		<form method="post">
			
			<h2>Login</h2>

			<input type="text" name="usuario" placeholder="usuario" required>

			<input type="password" name="senha" placeholder="senha" required>

			<input type="submit" name="acao" value="Logar">

		</form>

	</div>


</body>
</html>