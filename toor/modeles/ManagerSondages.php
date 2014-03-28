<?php

	// Classes à charger
	include($_SERVER['DOCUMENT_ROOT'].'/web/musikeole/modeles/ConnexionBDD.php');
	include($_SERVER['DOCUMENT_ROOT'].'/web/musikeole/includes/packageSondages.php');

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
		function getSondages()
		{
			$liste = array();
			$reqSondages = $this->connexion->getConnexion()->prepare('SELECT * FROM sondages');
			$reqSondages->execute();
			while ($ligne = $reqSondages->fetch()) {
				array_push($liste, new Sondage($ligne['id'], $ligne['titre'], $ligne['votants'], $ligne['date'], $ligne['actif']));
			}
			return $liste;
		}

	}

?>