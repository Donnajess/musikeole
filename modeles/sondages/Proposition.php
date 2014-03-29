<?php

	/**
	 * Proposition de réponse d'une question d'un sondage
	 */
	class Proposition
	{

		protected $id;
		protected $valeur;
		protected $votes;

		/**
		 * Constructeur
		 * @param int $pid 			id de la proposition
		 * @param string $pvaleur 	contenu de la proposition
		 */
		function __construct($pid, $pvaleur){
			$this->id = $pid;
			$this->valeur =$pvaleur;
		}

		/**
		 * Accesseur de id.
		 * @return int identifiant de la proposition
		 */
		public function getId(){
			return $this->id;
		}

		/**
		 * Accesseur de valeur.
		 * @return string contenu de la proposition
		 */
		public function getValeur(){
			return $this->valeur;
		}	

		/**
		* Accesseur de votes.
		* @return int nombre de votes de la proposition
		*/
		public function getVotes()
		{
			return $this->votes;
		}

		/**
		* Mutateur de votes.
		* @param int $votes nombre de votes de la proposition
		*/
		public function setVotes($votes)
		{
			$this->votes = $votes;
		}

		public function pourcentageVotes($nombreVotesTotal)
		{
			$pourcentage = ($nombreVotesTotal > 0) ? round($this->votes *100 / $nombreVotesTotal) : 0 ;
			return $pourcentage;
		}
}

?>