<?php
	
	/**
	 * Question d'un sondage
	 */
	class Question
	{

		protected $id;
		protected $valeur;
		protected $propositions;

		/**
		 * Constructeur
		 * @param int $pid           					identifiant de la question
		 * @param string $pvaleur    					contenu de la question
		 * @param array<Proposition> $ppropositions 	Liste des réponses possibles à la question
		 */
		function __construct($pid, $pvaleur, $ppropositions)
		{
			$this->id = $pid;
			$this->valeur = $pvaleur;
			$this->propositions = array();
			$this->propositions = $ppropositions;
		}

		/**
		 * Accesseur de l'identifiant.
		 * @return int identifiant de la question
		 */
		public function getId(){
			return $this->id;
		}

		/**
		* Accesseur de valeur.
		* @return string valeur de la question
		*/
		public function getValeur()
		{
			return $this->valeur;
		}

		/**
		* Accesseur de propositions.
		* @return array<Proposition> propositions de la question
		*/
		public function getPropositions()
		{
			return $this->propositions;
		}
}

?>