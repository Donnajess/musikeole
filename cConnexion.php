<?php
	// Chargement des classes
	include('modeles/ConnexionBDD.php');
	include('modeles/ManagerConnexion.php');

	$manager = new ManagerConnexion();

	if(isset($_POST['connexion'])) 
	{
		$mail = $_POST['mail'];
		$password = $_POST['password'];
		$password = md5($password);
		$connexionOK = $manager->Connexion($mail, $password);
		if($connexionOK == true) 
		{
			session_start();
    		$_SESSION['mail'] = $mail; 
    		$_SESSION['idAutorisation'] = 2; 
    		header('Location:index.php');
		}
		else
		{
			$message_erreur = 'Mauvais identifiants !';
			include("connexion.php");
		}

	}

?>