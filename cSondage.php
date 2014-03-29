<?php
	
	include('includes/packageSondages.php');
	include('modeles/ConnexionBDD.php');
	include('modeles/ManagerVotes.php');

	$manager = new ManagerVotes();

	if (isset($_POST['validerSondage'])) {
		// Récupération du vote, création du cookie
	}

	if (!true) { // Cookie vote
		$titre = $manager->getTitre();
		include('vues/sondages/dejaVote.php');
	}else{
		$sondage = $manager->getSondage();
		include('vues/sondages/sondage.php');
	}

?>