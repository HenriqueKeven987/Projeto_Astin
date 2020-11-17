
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


	define('INCLUDE_PATH_PAINEL','http://10.10.113.42/projeto_astin/');

	define('HOST','localhost');
	define('DATABASE','atendimento');
	define('USER','root');
	define('PASSWORD','');


?>


