<?php
	
	/**
	 * Question d'un sondage
	 */
	class Question
	{

		protected $id;
		protected $valeur;
		protected $type;
		protected $propositions;

		/**
		 * Constructeur
		 * @param int $pid           					identifiant de la question
		 * @param string $pvaleur    					contenu de la question
		 * @param array<Proposition> $ppropositions 	Liste des réponses possibles à la question
		 */
		function __construct($pid, $pvaleur, $ptype, $ppropositions = null)
		{
			$this->id = $pid;
			$this->valeur = $pvaleur;
			$this->type = $ptype;
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
		* Accesseur de type.
		* @return Type type de la question (radio ou liste déroulante)
		*/
		public function getType()
		{
			return $this->type;
		}

		/**
		* Accesseur de propositions.
		* @return array<Proposition> propositions de la question
		*/
		public function getPropositions()
		{
			return $this->propositions;
		}

		/**
		* Mutateur de propositions.
		* @param array<Proposition> $propositions liste des réponses à la question
		*/
		public function setPropositions($propositions)
		{
			$this->propositions = $propositions;
		}
}

?>