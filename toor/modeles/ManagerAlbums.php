<?php

	/**
	* Classe manager des albums photo en back-end
	*/
	class ManagerAlbums
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