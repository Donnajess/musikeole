<?php

	$manager = new ManagerVotes();

	if ($manager->getCookie()) {
		$titre = $manager->getTitre();
		include('vues/sondages/dejaVote.php');
	}else{
		$sondage = $manager->getSondage();
		include('vues/sondages/sondage.php');
	}

?>