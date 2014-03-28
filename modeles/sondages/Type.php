<?php

	/**
	 * Type de question (radio ou liste déroulante)
	 */
	class Type
	{

		protected $id;
		protected $nom;

		/**
		 * Constructeur
		 * @param int $pid  id du type
		 */
		function __construct($pid){
			$this->id = $pid;
			if ($pid == 1) {
				$this->$nom = 'radio';
			}else{
				$this->nom = 'liste déroulante';
			}
		}

		/**
		 * Accesseur de id.
		 * @return int identifiant de la proposition
		 */
		public function getId(){
			return $this->id;
		}

		/**
		 * Accesseur de nom.
		 * @return string nom humain du type
		 */
		public function getValeur(){
			return $this->valeur;
		}
		
	}

?>