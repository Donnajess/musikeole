<?php
	session_start();

	function __autoload($class)
	{
		static $classDir = '/modeles';
		$file = str_replace('\\', DIRECTORY_SEPARATOR, ltrim($class, '\\')) . '.php';
		require "$classDir/$file";
	}

	// Chargement des classes
	include('../modeles/ConnexionBDD.php');
	include('modeles/ManagerContenu.php');

	$manager = new ManagerContenu();

	if (isset($_GET['action'])) {
		$action = htmlentities($_GET['action']);
	}else{
		$action = 'index';
	}

	switch ($action) {

		case 'index':
			include('vues/agenda/index.php');
			break;

		default:
			include('vues/agenda/index.php');
			break;

	}

?>