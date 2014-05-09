<?php

	include('modeles/contenus/Publicite.php');
	$pdo = new ConnexionBDD();
	$reqPubs = $pdo->getConnexion()->prepare('SELECT * FROM publicites WHERE active = 1 ORDER BY indice DESC');
	$reqPubs->execute();
	$listePubs = array();
	while ($ligne = $reqPubs->fetch()) {
		array_push($listePubs, new Publicite($ligne['id'], $ligne['nom'], $ligne['image'], $ligne['lien'], $ligne['mailAnnonceur'], $ligne['indice'], $ligne['active']));
	}

?>