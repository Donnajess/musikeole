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
			$reqConnexion = $this->connexion->getConnexion()->prepare('SELECT id FROM membres WHERE mail = :mail AND motDePasse = :password AND idAutorisation = 2');
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
		public function getIdAutorisation($mail) {
			$reqIdAuto = $this->connexion->getConnexion()->prepare('SELECT idAutorisation FROM membres WHERE mail = ?');
			$reqIdAuto->execute(array($mail));
			return $reqIdAuto;
		}

	}

?>