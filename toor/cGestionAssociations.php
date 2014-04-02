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

		case 'ajouterAssociation':
			
			break;

		case 'modifierAssociation':

			break;

		case 'modifierEcole':
			$manager->modifierPresentationEcole($_POST['presentationEcole']);
			$message = 'La présentation de l\' école a été mise à jour.';
			$presentationEcole = $manager->getPresentationEcole();
			$associations = $manager->getAssociations();
			include('vues/contenu/associations/index.php');
			break;

		case 'index':
			$presentationEcole = $manager->getPresentationEcole();
			$associations = $manager->getAssociations();
			include('vues/contenu/associations/index.php');
			break;

		default:
			$presentationEcole = $manager->getPresentationEcole();
			$associations = $manager->getAssociations();
			include('vues/contenu/associations/index.php');
			break;

	}

?>