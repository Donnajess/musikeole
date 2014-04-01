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
	include('includes/packageContenus.php');
	include('modeles/ManagerContenu.php');

	$manager = new ManagerContenu();

	if (isset($_GET['action'])) {
		$action = htmlentities($_GET['action']);
	}else{
		$action = 0;
	}

	switch ($action) {

		case 'index':
			$textes = $manager->getTextesMusikEole();
			// + membres du bureau
			include('vues/contenu/musikeole/index.php');
			break;

		case 'presentation':
			$manager->enregistrerTexteMusikEole('presentation.txt', $_POST['formPresentation']);
			$message = 'La présentation a été enregistrée.';
			$textes = $manager->getTextesMusikEole();
			// + membres du bureau
			include('vues/contenu/musikeole/index.php');
			break;

		case 'accueil':
			$manager->enregistrerTexteMusikEole('accueil.txt', $_POST['formAccueil']);
			$message = 'Le message d\'accueil a été enregistrée.';
			$textes = $manager->getTextesMusikEole();
			// + membres du bureau
			include('vues/contenu/musikeole/index.php');
			break;

		case 'association':
			$manager->enregistrerTexteMusikEole('association.txt', $_POST['formAssociation']);
			$message = 'La page de l\'association a été enregistrée.';
			$textes = $manager->getTextesMusikEole();
			// + membres du bureau
			include('vues/contenu/musikeole/index.php');
			break;

		case 'coordonnees':
			$manager->modifierAdresseMusikEole($_POST['adresse'], $_POST['codePostal'], $_POST['ville'], $_POST['telephone'], $_POST['mail']);
			$message = 'Les informations de contact de l\'association ont été enregistrées.';
			$textes = $manager->getTextesMusikEole();
			// + membres du bureau
			include('vues/contenu/musikeole/index.php');
			break;

		default:
			$messageErreur = 'Désolé, une erreur est survenue.';
			include('vues/erreur.php');
			break;

	}

?>