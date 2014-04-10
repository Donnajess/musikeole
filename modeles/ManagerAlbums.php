<?php

	/**
	* Manager de la galerie photos en front-end
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

		public function getAlbums()
		{
			return true;
		}

		public function getAlbum($id)
		{
			return true;
		}

	}

?>