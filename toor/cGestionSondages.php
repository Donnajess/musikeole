<?php
	session_start();

	function __autoload($class)
	{
		static $classDir = '/modeles';
		$file = str_replace('\\', DIRECTORY_SEPARATOR, ltrim($class, '\\')) . '.php';
		require "$classDir/$file";
	}

	include("modeles/ManagerSondages.php");

	$monManager = new ManagerSondages();

	if (isset($_GET['action'])) {
		$action = htmlentities($_GET['action']);
	}else{
		$action = 0;
	}

	switch ($action) {

		case 'foo':
			
			break;
		
		case 'bar':

			break;

		default:
			$messageErreur = "Désolé, une erreur est survenue.";
			include("vues/erreur.php");
			break;

	}

?>