<?php

	class ManagerConnexion
	{
		protected $connexion;

		function __construct()
		{
			$this->connexion = new ConnexionBDD();
		}

		public function connexion($mail, $password)
		{
			$reqConnexion = $this->connexion->getConnexion()->prepare('SELECT id FROM membres WHERE mail = :mail AND motDePasse = :password');
			$reqConnexion->execute(array(
			    'mail' => $mail,
			    'password' => $password));
			$resultat = $reqConnexion->fetch();

			if (!$resultat)
			{
			    $connexionOK = false;
			}
			else
			{
			    $connexionOK = true;
			}
			return $connexionOK;
		}

	}

?>