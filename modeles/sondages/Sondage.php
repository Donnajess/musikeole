<?php

	/**
	* Sondage : contient un groupe de questions
	*/
	class Sondage
	{
		
		protected $id;
		protected $nom;
		protected $date;
		protected $actif;
		protected $questions;

		/**
		 * Constructeur
		 * @param int $pid        identifiant
		 * @param string $pnom     nom du sondage
		 * @param int $pdate      timestamp de la création du sondage
		 * @param bool $pactif     sondage actuel
		 * @param array<Question> $pquestions liste des questions du sondage
		 */
		function __construct($pid, $pnom, $pdate, $pactif, $pquestions)
		{
			$this->id = $pid;
			$this->nom = $pnom;
			$this->date = $pdate;
			$this->actif = $pactif;
			$this->questions = $pquestions;
		}
	
		/**
		* Accesseur de id.
		* @return int identifiant du sondage
		*/
		public function getId()
		{
			return $this->id;
		}

		/**
		* Accesseur de nom.
		* @return string nom du sondage
		*/
		public function getNom()
		{
			return $this->nom;
		}

		/**
		* Accesseur de date.
		* @return int timestamp de la création du sondage / string date formatée de la création du sondage
		*/
		public function getDate()
		{
			return $this->date;
		}

		/**
		* Accesseur de actif.
		* @return bool retourne true si le sondage est celui affiché sur le site, faux sinon
		*/
		public function getActif()
		{
			return $this->actif;
		}

		/**
		* Accesseur de questions.
		* @return array<Question> le tableau contenant les questions du sondage
		*/
		public function getQuestions()
		{
			return $this->questions;
		}
}

?>