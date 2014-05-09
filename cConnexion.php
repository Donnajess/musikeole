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
		$idAutorisation = $manager->getIdAutorisation($mail);
		if(($connexionOK == true) && (idAutorisation != 1)) 
		{
			session_start();
    		$_SESSION['mail'] = $mail; 
    		if(idAutorisation == 2)
    		{
    			$_SESSION['idAutorisation'] = 2; 
    		} elseif(idAutorisation == 3) {
    			$_SESSION['idAutorisation'] = 3; 
    		}
    		header('Location:index.php');
		}
		else
		{
			$message_erreur = 'Mauvais identifiants !';
			include("connexion.php");
		}

	}

?>