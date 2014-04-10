<?php
	mysql_connect("localhost","root","");
   	mysql_select_db("musikeole");

   	if(isset($_POST['mdpOublie'])) 
   	{
   		$mail = $_POST['mail'];
		//Générer un mot de passe aléatoire		 
		function random($car) {
			$string = "";
			$chaine = "abcdefghijklmnopqrstuvwxyz0123456789";
			srand((double)microtime()*1000000);
			for($i=0; $i<$car; $i++) {
				$string .= $chaine[rand()%strlen($chaine)];
			}
			return $string;
		}
		// Génère une chaine de longueur 6
		$mdp = random(6);
		$mdpcrypt = md5($mdp);

		$sql = "UPDATE membres SET motDePasse='$mdpcrypt' WHERE mail='$mail'";
		mysql_query($sql);

		$sujet = 'Musik\'Eole - Nouveau mot de passe';
		$texte = 'Vous avez demandé à réinitialiser votre mot de passe.'."\r\n".'Voici votre nouveau mot de passe : '.$mdp;
		mail($mail,$sujet,$texte);
	}

?>