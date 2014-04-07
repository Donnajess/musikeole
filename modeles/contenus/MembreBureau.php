<?php

	/**
	* Classe des Membres du bureau
	*/
	class MembreBureau
	{

		protected $id;
		protected $nom;
		protected $prenom;
		protected $role;
		protected $dateEntree;
		protected $indice;
		protected $activite;
		protected $photo;
		
		function __construct($pnom, $pprenom, $prole, $pdateEntree, $pindice, $pactivite)
		{
			$this->nom = $pnom;
			$this->prenom = $pprenom;
			$this->role = $prole;
			$date = explode('-', $pdateEntree);
			$pdateEntree = $date[2].'-'.$date[1].'-'.$date[0];
			$this->dateEntree = $pdateEntree;
			$this->indice = $pindice;
			$this->activite = $pactivite;
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
		* Accesseur de prenom.
		* @return string
		*/
		public function getPrenom()
		{
			return $this->prenom;
		}

		/**
		* Mutateur de prenom.
		* @param string $prenom  prenom
		*/
		public function setPrenom($prenom)
		{
			$this->prenom = $prenom;
		}

		/**
		* Accesseur de role.
		* @return string
		*/
		public function getRole()
		{
			return $this->role;
		}

		/**
		* Mutateur de role.
		* @param string $role  role
		*/
		public function setRole($role)
		{
			$this->role = $role;
		}

		/**
		* Accesseur de date entree.
		* @return string
		*/
		public function getDateEntree()
		{
			return $this->dateEntree;
		}

		public function getDateEntreeFr()
		{
			$date = explode('-', $this->dateEntree);
			$date = $date[2].'-'.$date[1].'-'.$date[0];
			return $date;
		}

		public function getDateEntreeSlash()
		{
			$date = explode('-', $this->dateEntree);
			$date = $date[0].'/'.$date[1].'/'.$date[2];
			return $date;
		}


		/**
		* Mutateur de date entree.
		* @param string $dateEntree  date entree
		*/
		public function setDateEntree($dateEntree)
		{
			$this->dateEntree = $dateEntree;
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
		* Accesseur de activite.
		* @return string
		*/
		public function getActivite()
		{
			return $this->activite;
		}

		/**
		* Mutateur de activite.
		* @param string $activite  activite
		*/
		public function setActivite($activite)
		{
			$this->activite = $activite;
		}

		/**
		* Accesseur de photo.
		* @return string
		*/
		public function getPhoto()
		{
			return $this->photo;
		}

		/**
		* Mutateur de photo.
		* @param string $photo  photo
		*/
		public function setPhoto($photo)
		{
			$this->photo = $photo;
		}
}

?>

