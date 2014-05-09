<?php
	// Chargement des classes
	include('modeles/ConnexionBDD.php');
	include('modeles/ManagerMdpOublie.php');

	$manager = new ManagerMdpOublie();

	if(isset($_POST['mdpOublie'])) 
	{
   		$mail = $_POST['mail'];
		
		// Génère une chaine de longueur 6
		$mdp = $manager->random(6);
		$mdpcrypt = md5($mdp);

		$manager->ChangerMdp($mail, $mdpcrypt);

		$sujet = 'Musik\'Eole - Nouveau mot de passe';
		$texte = 'Vous avez demandé à réinitialiser votre mot de passe.'."\r\n".'Voici votre nouveau mot de passe : '.$mdp;
		mail($mail,$sujet,$texte);
		$message = "Un nouveau mot de passe vous a été envoyé par mail. Une fois connecté nous vous conseillons de le changer.";
	} else {
		$message_erreur = "Une erreur s'est produite";
	}

?>