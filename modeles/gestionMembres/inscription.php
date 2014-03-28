<?php
	mysql_connect("localhost","root","");
	mysql_select_db("musikeole");
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Inscription</title>
</head>
<body>
	<form action="inscription.php" method="POST" accept-charset="utf-8">	
		<div>
	    	<input type="text" id="nom" name="nom" placeholder="Nom">
	  	</div>		
		<div>
	    	<input type="text" id="prenom" name="prenom" placeholder="Prénom">
	  	</div>			
		<div>
	    	<input type="email" id="mail" name="mail" placeholder="Adresse mail">
	  	</div>	
		<div>
	    	<input type="text" id="pseudo" name="pseudo" placeholder="Pseudo">
	  	</div>	
		<div>
	    	<input type="password" id="password" name="password" placeholder="Password">
	  	</div>
	  	<div>
	    	<input type="password" id="password_verif" name="password_verif" placeholder="Confirmation Password">
	  	</div>
		<input type="submit" value="Valider">
	</form>

	<?php
	if(isset($_POST['nom'])) 
	{
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom']; 
		$mail = $_POST['mail'];
		$pseudo = $_POST['pseudo'];
		$password = $_POST['password'];
		$password_verif = $_POST['password_verif'];
		$i = 0; //compte le nombre d'erreurs 

		/*//vérification disponibilité du pseudo
		$sql = "SELECT COUNT(*) AS existe FROM membres WHERE pseudo = $pseudo";
		$req = mysql_query($sql);
		$data = mysql_fetch_array($req);
		$existe = $data['existe'];
		if($existe == 0) 
		{
			$erreur_pseudo1 = "Votre pseudo est déjà utilisé";
			$i++;
		}*/
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
/*		//vérification disponibilité du mail
		$sql = "SELECT COUNT(*) AS existe FROM membres WHERE mail = $mail";
		$req = mysql_query($sql);
		$data = mysql_fetch_array($req);
		$existe = $data['existe'];
		if($existe == 0) 
		{
			$erreur_mail1 = "Votre adresse mail est déjà utilisé";
			$i++;
		}*/
		//vérification nombre de caractère de l'adresse mail
		if(strlen($mail) < 5 || strlen($mail) > 30) 
		{
			$erreur_mail2 = "Votre adresse mail est incorrecte";
			$i++;
		}
		//vérification de l'adresse mail
	    if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $mail))
	    {
	        $erreur_mail3 = "Votre adresse mail n'a pas un format valide";
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

	    	echo "Inscription réussie !";
	    } 
	    else 
	    {
	    	//a modifier
	    	echo $i."Erreurs - Veuillez remplir tous les champs !";
	    }	
	}
?>
</body>
</html>