<?php
	mysql_connect("localhost","root","");
   	mysql_select_db("musikeole");
   	session_start();

   	if(isset($_POST['changerMdp'])) {
   		$ancienMdp = $_POST['ancienMdp'];
   		$nouveauMdp = $_POST['nouveauMdp'];
   		$confirmMdp = $_POST['confirmMdp'];
   		$mail = $_SESSION['mail'];

   		$sql = "SELECT motDePasse FROM membres WHERE mail = '$mail'";
   		$req = mysql_query($sql) or die(mysql_error());
		$nr = mysql_num_rows($req);
		if($nr > 0) 
		{
			if($nouveauMdp == $confirmMdp) {
				$nouveauMdpCrypt = md5($nouveauMdp);
				$sql2 = "UPDATE membres SET motDePasse = '$nouveauMdpCrypt' WHERE mail='$mail'";
				mysql_query($sql2);
				header('Location: ../../index.php');
			}
			else
			{
				$erreur_mdpDiff = 'Vos nouveaux mots de passe ne sont pas identiques';
			}
		}
		else
		{
			$erreur_mdp = 'Saisissez correctement votre ancien mot de passe';
		}
   	}