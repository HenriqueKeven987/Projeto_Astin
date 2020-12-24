
<?php
	
	session_start();

	$autoload = function($class){
		
		if($class == 'Email'){
			//incluir arquivo so que nao vai incluir mais de 1 vez
			require_once('classes/phpmailer/PHPMailerAutoload.php');
		}

		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);

	//constante de diretorio painel
	define('INCLUDE_PATH_PAINEL','http://localhost/Deposito_Astin/');

	//banco de dados
	define('HOST','localhost');
	define('DATABASE','atendimento');
	define('USER','root');
	define('PASSWORD','');

	function pesquisa($indice){

		return Painel::$pesquisa[$indice];
	}


?>


