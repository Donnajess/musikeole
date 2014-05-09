<?php
	// Chargement des classes
	include('modeles/ConnexionBDD.php');
	include('modeles/ManagerChangerMdp.php');
	$manager = new ManagerChangerMdp();

	if(isset($_POST['changerMdp'])) 
	{
   		$ancienMdp = $_POST['ancienMdp'];
   		$nouveauMdp = $_POST['nouveauMdp'];
   		$confirmMdp = $_POST['confirmMdp'];
		$mail = $_SESSION['mail'];
		$compteOK = $manager->VerifierCompte($mail, $ancienMdp);

		if($compteOK == true) 
		{
			if($nouveauMdp == $confirmMdp) {
				$nouveauMdpCrypt = md5($nouveauMdp);
				$manager->NewMdp($mail, $nouveauMdpCrypt);
				$message = "Votre mot de passe a été modifié avec succès";
				include("changerMdp.php");
			} else {
				$message_erreur = "Vos nouveaux mots de passe ne sont pas identiques";
				include("changerMdp.php");
			}
		}
		include("changerMdp.php");
	} else {
		$message_erreur = "Une erreur s'est produite";
		include("changerMdp.php");
	}

?>