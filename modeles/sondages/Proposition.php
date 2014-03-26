<?php

	/**
	 * Proposition de réponse d'une question d'un sondage
	 */
	class Proposition
	{

		protected $id;
		protected $valeur;

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
		
	}

?>