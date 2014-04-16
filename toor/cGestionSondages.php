<?php
	session_start();

if (isset($_SESSION['idAutorisation']) && $_SESSION['idAutorisation'] > 2) {

	function __autoload($class)
	{
		static $classDir = '/modeles';
		$file = str_replace('\\', DIRECTORY_SEPARATOR, ltrim($class, '\\')) . '.php';
		require "$classDir/$file";
	}

	// Chargement des classes
	include('../modeles/ConnexionBDD.php');
	include('includes/packageSondages.php');
	include('modeles/ManagerSondages.php');

	$manager = new ManagerSondages();

	if (isset($_GET['action'])) {
		$action = htmlentities($_GET['action']);
	}else{
		$action = 0;
	}

	switch ($action) {

		case 'liste':
			$listeSondages = $manager->getSondages();
			include("vues/sondages/liste.php");
			break;
		
		case 'formulaire':
			$titre = $_POST['titre'];
			$nbQuestions = $_POST['nbQuestions'];
			include("vues/sondages/formulaire.php");
			break;

		case 'valider':
			$titre = $_POST['titre'];
			$nbQuestions = $_POST['nbQuestions'];
			$questionsSondages = array();
			for ($i=0; $i < $nbQuestions; $i++) { 
				$num = $i + 1;
				$question = $_POST['question'.$num];
				$type = new Type($_POST['type'.$num]);
				$propositionsQuestion = array();
				$numProposition = 1;
				while (isset($_POST['proposition'.$numProposition.'-'.$num]) && !empty($_POST['proposition'.$numProposition.'-'.$num])) {
					array_push($propositionsQuestion, new Proposition(0, $_POST['proposition'.$numProposition.'-'.$num]));
					$numProposition++;
				}
				array_push($questionsSondages, new Question(0, $question, $type, $propositionsQuestion));
			}
			$nouveauSondage = new Sondage(0, $titre, 0, time(), 1, $questionsSondages);
			$manager->creerSondage($nouveauSondage);
			$message = 'Le sondage "'.$titre.'" a bien été créé.';
			$listeSondages = $manager->getSondages();
			include("vues/sondages/liste.php");
			break;

		case 'supprimer':
			$idSondage = $_GET['id'];
			$manager->supprimerSondage($idSondage);
			$message = "Le sondage a bien été supprimé.";
			$listeSondages = $manager->getSondages();
			include("vues/sondages/liste.php");
			break;

		case 'activer':
			$titreSondage = $manager->activerSondage($_GET['id']);
			$message = 'Le sondage "'.$titreSondage.'" a été activé. Il est maintenant visible sur le site.';
			$listeSondages = $manager->getSondages();
			include("vues/sondages/liste.php");
			break;

		case 'detail':
			$sondage = $manager->getSondage($_GET['id']);
			include("vues/sondages/detail.php");
			break;

		default:
			$messageErreur = "Désolé, une erreur est survenue.";
			include("vues/erreur.php");
			break;

	}

}else{
	header('Location: ../index.php');
	exit();
}

?>