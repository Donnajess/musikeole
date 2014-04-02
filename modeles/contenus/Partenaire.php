<?php

	/**
	* Classe représentant un partenaire
	*/
	class Partenaire
	{

		protected $id;
		protected $nom;
		protected $logo;

		function __construct($pid, $pnom, $plogo, $pchemin)
		{
			$this->id = $pid;
			$this->nom = $pnom;
			$this->logo = $pchemin.$plogo;
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
		* Accesseur de logo.
		* @return string
		*/
		public function getLogo()
		{
			return $this->logo;
		}

		/**
		* Mutateur de logo.
		* @param string $logo  logo
		*/
		public function setLogo($logo)
		{
			$this->logo = $logo;
		}
	}

?>