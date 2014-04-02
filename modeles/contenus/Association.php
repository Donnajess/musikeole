<?php

	/**
	* Classe représentant une association
	*/
	class Association
	{

		protected $id;
		protected $nom;
		protected $fichier;
		protected $contenu;
		protected $indice;

		function __construct($pid, $pnom, $pfichier, $pindice, $pdossier)
		{
			$this->id = $pid;
			$this->nom = $pnom;
			$this->fichier = $pfichier;
			$this->indice = $pindice;
			$lienFichier = $pdossier.$pfichier;
			$this->contenu = '';
			if (file_exists($lienFichier)) {
				$fichier = fopen($lienFichier, 'r');
				while ($ligne = fgets($fichier)) {
					$contenu.=$ligne;
				}
				fclose($fichier);
			}
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
		* Accesseur de nom.
		* @return string
		*/
		public function getNom()
		{
			return $this->nom;
		}

		/**
		* Mutateur de nom.
		* @param string $nom  nom
		*/
		public function setNom($nom)
		{
			$this->nom = $nom;
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

		/**
		* Accesseur de contenu.
		* @return string
		*/
		public function getContenu()
		{
			return $this->contenu;
		}

		/**
		* Mutateur de contenu.
		* @param string $contenu  contenu
		*/
		public function setContenu($contenu)
		{
			$this->contenu = $contenu;
		}

		/**
		* Accesseur de indice.
		* @return int
		*/
		public function getIndice()
		{
			return $this->indice;
		}

		/**
		* Mutateur de indice.
		* @param int $indice  indice
		*/
		public function setIndice($indice)
		{
			$this->indice = $indice;
		}

	}

?>