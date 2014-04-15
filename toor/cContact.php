<?php

	// Chargement des classes
	include('../modeles/ConnexionBDD.php');
	include('modeles/ManagerContact.php');

	$manager = new ManagerContact();

	if(isset($_POST['message'])) {
		$titre = mysql_real_escape_string($_POST['titre']);
		$message = mysql_real_escape_string($_POST['message']);
		$listeMails = $manager->getMails();
		foreach ($listeMails as $mail) {
			mail($mail, $titre, $message);
		}
		$message = "Les messages sont en cours d'envoi...";
		include("contact.php");
	}
	else
	{
		$message_erreur = "Une erreur s'est produit.";
		include("contact.php");
	}
	


?>