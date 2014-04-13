<?php

	class Adherent
	{	
		protected $id;
		protected $nom;
		protected $prenom;
		protected $dateNaissance;
		protected $telephone;
		protected $mail;

		function __construct($id, $nom, $prenom, $dateNaissance, $telephone, $mail)
		{
			$this->id = $id;
			$this->nom = $nom;
			$this->prenom = $prenom;
			$this->dateNaissance = $dateNaissance;
			$this->telephone = $telephone;
			$this->mail = $mail;
		}
	
		public function getId()
		{
			return $this->id;
		}
		public function getNom()
		{
			return $this->nom;
		}
		public function getPrenom()
		{
			return $this->prenom;
		}
		public function getDateNaissance()
		{
			return $this->dateNaissance;
		}
		public function getTelephone()
		{
			return $this->telephone;
		}
		public function getMail()
		{
			return $this->mail;
		}
}

?>