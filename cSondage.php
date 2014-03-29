<?php
	
	include('includes/packageSondages.php');
	include('modeles/ConnexionBDD.php');
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
	}

	if (!true) { // Cookie vote
		$titre = $manager->getTitre();
		include('vues/sondages/dejaVote.php');
	}else{
		$sondage = $manager->getSondage();
		include('vues/sondages/sondage.php');
	}

?>