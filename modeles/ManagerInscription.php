<?php

	class ManagerInscription
	{
		protected $connexion;

		function __construct()
		{
			$this->connexion = new ConnexionBDD();
		}

		public function creerAdherents($adherents)
		{
			foreach ($adherents as $adherent) {
				$reqAdherents = $this->connexion->getConnexion()->prepare('INSERT INTO membres VALUES (0, ?, ?, ?, ?, ?, ?, 1)');
				$reqAdherents->execute(array($adherent->getNom(), $adherent->getPrenom(), $adherent->getDateNaissance(), $adherent->getTelephone(), $adherent->getMail(), md5($adherent->getPassword())));
			}
		}

	}

?>