<?php

	/**
	* Classe manager de la gestion des contenus
	*/
	class ManagerContenu
	{
		
		protected $connexion;

		/**
		 * Constructeur
		 */
		function __construct()
		{
			$this->connexion = new ConnexionBDD();
		}

		public function enregistrerTexteMusikEole($pfichier, $ptexte)
		{
			$fichier = fopen('../data/contenu/musikeole/'.$pfichier, 'r+');
			ftruncate($fichier, 0);
			fseek($fichier, 0);
			fputs($fichier, $ptexte);
			fclose($fichier);
		}

	}

?>