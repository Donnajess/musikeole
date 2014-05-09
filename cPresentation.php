<?php
	session_start();

	function __autoload($class)
	{
		static $classDir = '/modeles';
		$file = str_replace('\\', DIRECTORY_SEPARATOR, ltrim($class, '\\')) . '.php';
		require "$classDir/$file";
	}

	// Chargement des classes
	include('modeles/ConnexionBDD.php');
	include('modeles/contenus/Association.php');
	include('modeles/contenus/MembreBureau.php');
	include('modeles/ManagerPresentation.php');

	$manager = new ManagerPresentation();

	$associations = $manager->getAssociations();

	if (isset($_GET['action'])) {
		$action = htmlentities($_GET['action']);
	}else{
		$action = 'index';
	}

	$page = 'presentation';

	switch ($action) {

		case 'membresBureau':
			$membres = $manager->getMembresBureau();
			include('vues/presentation/membres.php');
			break;

		case 'equipePedagogique':
			$membres = $manager->getEquipePedagogique();
			include('vues/presentation/equipePedagogique.php');
			break;

		case 'association':
			$texte = $manager->getPresentationAssociation(htmlentities($_GET['id']));
			include('vues/presentation/index.php');
			break;

		case 'ecoleDeMusique':
			$texte = $manager->getPresentationEcoleMusique();
			include('vues/presentation/index.php');
			break;

		case 'reglements':
			include('vues/presentation/reglements.php');
			break;

		default:
			$texte = $manager->getPresentationMusikEole();
			include('vues/presentation/index.php');
			break;

	}

?>