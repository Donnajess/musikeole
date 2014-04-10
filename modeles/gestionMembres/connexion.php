<?php
	mysql_connect("localhost","root","");
   	mysql_select_db("musikeole");

	if(isset($_POST['connexion'])) 
	{
		$mail = $_POST['mail'];
		$password = $_POST['password'];
		$sql = "SELECT mail FROM membres WHERE mail = '$mail' AND motDePasse = '$password'";
		$res = mysql_query($sql) or die(mysql_error());
		$nr = mysql_num_rows($res);
		if($nr > 0) 
		{
			session_start();
    		$_SESSION['mail'] = $mail; 
    		header('Location:../../index.php');
		}
		else
		{
			echo '<div class="alert alert-error"> Connexion refusée</div>';
			die();
		}

	}
?>