<?php

	/**
	* Classe représentant un album photo
	*/
	class Album
	{

		protected $id;
		protected $nom;
		protected $photos;
		protected $manifestation;
		
		function __construct($pid, $pnom, $pphotos)
		{
			$this->id = $pid;
			$this->nom = $pnom;
			$this->photos = $pphotos;
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
		* Accesseur de photos.
		* @return array<Photo>
		*/
		public function getPhotos()
		{
			return $this->photos;
		}

		/**
		* Mutateur de photos.
		* @param array<Photo> $photos  photos
		*/
		public function setPhotos($photos)
		{
			$this->photos = $photos;
		}

		/**
		* Accesseur de manifestation.
		* @return Manifestation
		*/
		public function getManifestation()
		{
			return $this->manifestation;
		}

		/**
		* Mutateur de manifestation.
		* @param Manifestation $manifestation  manifestation
		*/
		public function setManifestation($manifestation)
		{
			$this->manifestation = $manifestation;
		}

	}

?>