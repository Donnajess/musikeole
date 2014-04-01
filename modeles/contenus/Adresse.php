<?php

	/**
	* Classe contenant les informations de contact de l'association Musik'Eole
	*/
	class Adresse
	{

		protected $rue;
		protected $codePostal;
		protected $ville;
		protected $telephone;
		protected $mail;

		function __construct($prue, $pcodePostal, $pville, $ptelephone, $pmail)
		{
			$this->rue = $prue;
			$this->codePostal = $pcodePostal;
			$this->ville = $pville;
			$this->telephone = $ptelephone;
			$this->mail = $pmail;
		}

		/**
		* Accesseur de rue.
		* @return string
		*/
		public function getRue()
		{
			return $this->rue;
		}

		/**
		* Mutateur de rue.
		* @param string $rue  rue
		*/
		public function setRue($rue)
		{
			$this->rue = $rue;
		}

		/**
		* Accesseur de code postal.
		* @return string
		*/
		public function getCodePostal()
		{
			return $this->codePostal;
		}

		/**
		* Mutateur de code postal.
		* @param string $codePostal  code postal
		*/
		public function setCodePostal($codePostal)
		{
			$this->codePostal = $codePostal;
		}

		/**
		* Accesseur de ville.
		* @return string
		*/
		public function getVille()
		{
			return $this->ville;
		}

		/**
		* Mutateur de ville.
		* @param string $ville  ville
		*/
		public function setVille($ville)
		{
			$this->ville = $ville;
		}

		/**
		* Accesseur de telephone.
		* @return string
		*/
		public function getTelephone()
		{
			return $this->telephone;
		}

		/**
		* Mutateur de telephone.
		* @param string $telephone  telephone
		*/
		public function setTelephone($telephone)
		{
			$this->telephone = $telephone;
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

}

?>