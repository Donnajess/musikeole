<?php

	class Champs
	{
		protected $nom;
		protected $prenom;
		protected $dateNaissance;
		protected $telephone;
		protected $mail;
		protected $password;

		function __construct($nom, $prenom, $dateNaissance, $telephone, $mail, $password){
			$this->nom = $nom;
			$this->prenom =$prenom;
			$this->dateNaissance = $dateNaissance;
			$this->telephone =$telephone;
			$this->mail = $mail;
			$this->password =$password;
		}

		public function getNom(){
			return $this->nom;
		}

		public function getPrenom(){
			return $this->prenom;
		}

		public function getDateNaissance(){
			return $this->dateNaissance;
		}

		public function getTelephone(){
			return $this->telephone;
		}

		public function getMail(){
			return $this->mail;
		}

		public function getPassword(){
			return $this->password ;
		}
}

?>