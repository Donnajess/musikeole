<?php
	session_start();

	function __autoload($class)
	{
		static $classDir = '/modeles';
		$file = str_replace('\\', DIRECTORY_SEPARATOR, ltrim($class, '\\')) . '.php';
		require "$classDir/$file";
	}

	include("modeles/ManagerSondages.php");

	$manager = new ManagerSondages();

	if (isset($_GET['action'])) {
		$action = htmlentities($_GET['action']);
	}else{
		$action = 0;
	}

	switch ($action) {

		case 'liste':
			$listeSondages = $manager.getSondages();
			include("vues/sondages/liste.php");
			break;
		
		case 'formulaireCreation':
			// Récupérer les variables (nom, nombre de questions)
			include("vues/sondages/formulaire.php");
			break;

		case 'validerCreation':
			// Récupérer les variables et créer les objets
			$manager.creerSondage($nouveauSondage);
			$message = "Le sondage *insérer nom* a bien été créé.";
			$listeSondages = $manager.getSondages();
			include("vues/sondages/liste.php");
			break;

		case 'supprimerSonsage':
			// Récupérer la variable
			$manager.supprimerSondage($id);
			$message = "Le sondage a bien été supprimé.";
			$listeSondages = $manager.getSondages();
			include("vues/sondages/liste.php");
			break;

		case 'consulterResultats':
			// Traitement
			break;

		default:
			$messageErreur = "Désolé, une erreur est survenue.";
			include("vues/erreur.php");
			break;

	}

?>