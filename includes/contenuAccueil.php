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

?>