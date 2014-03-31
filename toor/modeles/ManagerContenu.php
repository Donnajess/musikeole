<?php

	/**
	* Classe manager de la gestion des contenus
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

	}

?>