<?php

	// Classe à charger
	include("../../modeles/ConnexionBDD.php");

	/**
	* Classe manager de la fonctionnalité des sondages
	*/
	class ManagerSondages
	{
		
		protected $connexion;

		/**
		 * Constructeur
		 */
		function __construct()
		{
			$this->connexion = new ConnexionBDD();
		}

		/**
		 * récupère tous les sondages
		 * @return array<Sondage> liste des sondages
		 */
		public function getListe(){

			return $liste;
		}

	}

?>