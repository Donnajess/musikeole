<?php

	/**
	* Classe représentant une publicité
	*/
	class Publicite
	{

		protected $id;
		protected $nom;
		protected $image;
		protected $lien;
		protected $mail;
		protected $indice;
		protected $active;

		function __construct($pid, $pnom, $pimage, $plien, $pmail, $pindice, $pactive)
		{
			$this->id = $pid;
			$this->nom = $pnom;
			$this->image = $pimage;
			$this->lien = $plien;
			$this->mail = $pmail;
			$this->indice = $pindice;
			$this->active = $pactive;
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
		* Accesseur de image.
		* @return string
		*/
		public function getImage()
		{
			return $this->image;
		}

		/**
		* Mutateur de image.
		* @param string $image  image
		*/
		public function setImage($image)
		{
			$this->image = $image;
		}

		/**
		* Accesseur de lien.
		* @return string
		*/
		public function getLien()
		{
			return $this->lien;
		}

		/**
		* Mutateur de lien.
		* @param string $lien  lien
		*/
		public function setLien($lien)
		{
			$this->lien = $lien;
		}

		/**
		* Accesseur de mail.
		* @return string
		*/
		public function getMail()
		{
			return $this->mail;
		}

		/**
		* Mutateur de mail.
		* @param string $mail  mail
		*/
		public function setMail($mail)
		{
			$this->mail = $mail;
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

		/**
		* Accesseur de active.
		* @return bool
		*/
		public function getActive()
		{
			return $this->active;
		}

		/**
		* Mutateur de active.
		* @param bool $active  active
		*/
		public function setActive($active)
		{
			$this->active = $active;
		}

	}

?>