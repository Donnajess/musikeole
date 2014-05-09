<?php

	class ManagerAdherents
	{
		
		protected $connexion;

		function __construct()
		{
			$this->connexion = new ConnexionBDD();
		}

		public function getDemandesAdhesion()
		{
			$liste = array();
			$reqDemandes = $this->connexion->getConnexion()->prepare('SELECT * FROM membres WHERE idAutorisation = 1 ORDER BY nom ASC');
			$reqDemandes->execute();
			while ($ligne = $reqDemandes->fetch()) {
				array_push($liste, new Adherent($ligne['id'], $ligne['nom'], $ligne['prenom'], $ligne['dateNaissance'], $ligne['telephone'], $ligne['mail']));
			}
			return $liste;
		}

		public function getAdherents()
		{
			$liste = array();
			$reqAdherents = $this->connexion->getConnexion()->prepare('SELECT * FROM membres WHERE idAutorisation = 2 ORDER BY nom ASC');
			$reqAdherents->execute();
			while ($ligne = $reqAdherents->fetch()) {
				array_push($liste, new Adherent($ligne['id'], $ligne['nom'], $ligne['prenom'], $ligne['dateNaissance'], $ligne['telephone'], $ligne['mail']));
			}
			return $liste;
		}

		public function accepterDemande($pid)
		{
			$reqAccepter = $this->connexion->getConnexion()->prepare('UPDATE membres SET idAutorisation = 2 WHERE id = ?');
			$reqAccepter->execute(array($pid));
		}

		public function supprimerAdherent($pid)
		{
			$reqSuppression = $this->connexion->getConnexion()->prepare('DELETE FROM membres WHERE id = ?');
			$reqSuppression->execute(array($pid));
		}
	}

?>