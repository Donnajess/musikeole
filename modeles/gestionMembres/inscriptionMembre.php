<?php
	mysql_connect("localhost","root","");
	mysql_select_db("musikeole");


	if(isset($_POST['inscription'])) 
	{
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom']; 
		$mail = $_POST['mail'];
		$pseudo = $_POST['pseudo'];
		$password = $_POST['password'];
		$password_verif = $_POST['password_verif'];
		$i = 0; //compte le nombre d'erreurs 

		//vérification nombre de caractère du nom et prénom
		if(strlen($nom) < 2 || strlen($nom) > 20) 
		{
			$erreur_nom = "Votre nom doit comprendre entre 2 et 20 caractères";
			$i++;
		}	
		if(strlen($prenom) < 2 || strlen($prenom) > 20) 
		{
			$erreur_prenom = "Votre prénom doit comprendre entre 2 et 20 caractères";
			$i++;
		}
		//vérification disponibilité du mail
		$sql = "SELECT mail FROM membres WHERE mail = '$mail'";
		$req = mysql_query($sql);
		$nr = mysql_num_rows($req);
		if($nr > 0) 
		{
			$erreur_mail1 = "Cette adresse mail est déjà utilisé";
			$i++;
		}
		//vérification de l'adresse mail
	    if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $mail))
	    {
	        $erreur_mail3 = "Votre adresse mail n'a pas un format valide";
	        $i++;
	    }
		//vérification disponibilité du pseudo
		$sql = "SELECT pseudo FROM membres WHERE pseudo = '$pseudo'";
		$req = mysql_query($sql);
		$nr = mysql_num_rows($req);
		if($nr > 0) 
		{
			$erreur_pseudo1 = "Ce pseudo est déjà utilisé";
			$i++;
		}
		//vérification nombre de caractère du pseudo
		if(strlen($pseudo) < 3 || strlen($pseudo) > 15) 
		{
			$erreur_pseudo2 = "Votre pseudo doit comprendre entre 3 et 15 caractères";
			$i++;
		}	
		//Vérification du password
	    if ($password != $password_verif)
	    {
	        $erreur_password = "Vos mots de passe ne sont pas identiques";
	        $i++;
	    }
	    
	    //s'il n'y a aucune erreur on peut inscrire le nouveau membre
	    if($i == 0) 
	    {
	    	//cryptage du password
	    	$password = md5($password);
	    	//écriture dans la bdd
	    	$sql = "INSERT INTO membres(nom, prenom, mail, pseudo, password, idAutorisation) 
	    				VALUES ('$nom','$prenom','$mail','$pseudo','$password',1)";
	    	mysql_query($sql);
	    	$sql2 = "INSERT INTO familles(nom) VALUES ('$nom')";
	    	mysql_query($sql2);
	    	$inscription_correct = true;
	    	header('Location:../../vues/gestionMembres/inscriptionAdherent.php');
	    } 
	    else 
	    {	
	    	echo $i."Erreurs - Veuillez remplir tous les champs !";
	    }	
	}
?>