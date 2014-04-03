<?php

	/**
	* Classe manager de la gestion de l'agenda
	*/
	class ManagerAgenda
	{
		
		protected $connexion;

		/**
		 * Constructeur
		 */
		function __construct()
		{
			$this->connexion = new ConnexionBDD();
		}

		public function getAssociations()
		{
			$reqAssociations = $this->connexion->getConnexion()->prepare('SELECT * FROM associations ORDER BY indice DESC, nom');
			$reqAssociations->execute();
			$listeAssociations = array();
			while ($ligne = $reqAssociations->fetch()) {
				array_push($listeAssociations, new Association($ligne['id'], $ligne['nom'], $ligne['fichier'], $ligne['indice'], '../data/contenu/associations/'));
			}
			return $listeAssociations;
		}

	}

?>