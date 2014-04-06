<?php

	include('modeles/contenus/Partenaire.php');
	$pdo = new ConnexionBDD();
	$reqLogos = $pdo->getConnexion()->prepare('SELECT * FROM partenaires');
	$reqLogos->execute();
	$listeLogos = array();
	while ($ligne = $reqLogos->fetch()) {
		array_push($listeLogos, new Partenaire($ligne['id'], $ligne['nom'], $ligne['fichier'], 'data/images/partenaires/'));
	}

?>