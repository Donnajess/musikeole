<?php

	include('modeles/contenus/Adresse.php');
	$pdo = new ConnexionBDD();
	$reqAdresse = $pdo->getConnexion()->prepare('SELECT * FROM adresse');
	$reqAdresse->execute();
	$resAdresse = $reqAdresse->fetch();
	$coordonnees = new Adresse($resAdresse['rue'], $resAdresse['codePostal'], $resAdresse['ville'], $resAdresse['telephone'], $resAdresse['mail']);


?>