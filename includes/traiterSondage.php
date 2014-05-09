<?php
	
	include('includes/packageSondages.php');
	include('modeles/ManagerVotes.php');

	$manager = new ManagerVotes();

	if (isset($_POST['validerSondage'])) {
		$idQuestionSondage = 0;
		foreach ($_POST as $idQuestion => $reponse) {
			if ($idQuestion != "validerSondage") {
				$manager->enregistrerReponse($idQuestion, $reponse, $_SERVER['REMOTE_ADDR']);
				$idQuestionSondage = $idQuestion;
			}
		}
		$idSondage = $manager->trouverSondageAvecQuestion($idQuestionSondage);
		$manager->ajoutVoteSondage($idSondage);
		$manager->creerCookie();
		header('location: '.$_SERVER['REQUEST_URI']);
		exit;
	}

?>