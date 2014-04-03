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
	include('../modeles/contenus/Association.php');
	include('modeles/ManagerAgenda.php');

	$manager = new ManagerAgenda();

	if (isset($_GET['action'])) {
		$action = htmlentities($_GET['action']);
	}else{
		$action = 'index';
	}

	switch ($action) {

		case 'ajouterManifestation':
			$associations = $manager->getAssociations();
			include('vues/agenda/formulaire.php');
			break;

		case 'index':
			include('vues/agenda/index.php');
			break;

		default:
			include('vues/agenda/index.php');
			break;

	}

?>