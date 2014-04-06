<?php

	// Présentation
	$fichier = fopen('data/contenu/musikeole/presentation.txt', 'r');
	$presentation = '';
	while ($ligne = fgets($fichier)) {
		$presentation.=$ligne;
	}
	fclose($fichier);

	// Information
	$fichier = fopen('data/contenu/musikeole/accueil.txt', 'r');
	$informations = '';
	while ($ligne = fgets($fichier)) {
		$informations.=$ligne;
	}
	fclose($fichier);

	// Prochaine manifestation
	include('modeles/agenda/Manifestation.php');
	include('modeles/contenus/Association.php');
	$pdo = new ConnexionBDD();
	$reqManif = $pdo->getConnexion()->prepare('SELECT * FROM manifestations WHERE valide = 1 AND dateManif >= NOW() ORDER BY dateManif, idAssociation LIMIT 0,1');
	$reqManif->execute();
	$ligne = $reqManif->fetch();
	$manif = new Manifestation($ligne['id'], $ligne['nom'], $ligne['description'], formatDate($ligne['dateManif']), $ligne['heure'], $ligne['places'], $ligne['image'], $ligne['gratuit'], $ligne['prixAdherent'], $ligne['prixExterieur'], $ligne['prixEnfant'], getAssociation($ligne['idAssociation'], $pdo));

	// Fonctions utiles
	function formatDate($date)
	{
		$arrayDate = explode('-', $date);
		$dateFormatee = $arrayDate[2].'-'.$arrayDate[1].'-'.$arrayDate[0];
		return $dateFormatee;
	}

	function getAssociation($id, $pdo)
	{
		$reqAssociations = $pdo->getConnexion()->prepare('SELECT * FROM associations WHERE id = ?');
		$reqAssociations->execute(array($id));
		$association = $reqAssociations->fetch();
		$asso =  new Association($association['id'], $association['nom'], $association['fichier'], $association['indice'], '/data/contenu/associations/');
		return $asso;
	}

?>