<?php

	/**
	* Classe représnetant une photo d'un album
	*/
	class Photo
	{
		
		protected $id;
		protected $fichier;

		function __construct($pid, $pfichier)
		{
			$this->id = $pid;
			$this->fichier = $pfichier;
		}
	
		/**
		* Accesseur de id.
		* @return int
		*/
		public function getId()
		{
			return $this->id;
		}

		/**
		* Mutateur de id.
		* @param int $id  id
		*/
		public function setId($id)
		{
			$this->id = $id;
		}

		/**
		* Accesseur de fichier.
		* @return string
		*/
		public function getFichier()
		{
			return $this->fichier;
		}

		/**
		* Mutateur de fichier.
		* @param string $fichier  fichier
		*/
		public function setFichier($fichier)
		{
			$this->fichier = $fichier;
		}
	}

?>