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

		public function ouvrirTags()
		{
			if ($this->type->getId() == 1) {
				$tags = '';
			}else{
				$tags = '<select class="form-control" name="'.$this->id.'" id="'.$this->id.'" required>';
			}
			return $tags;
		}

		public function fermerTags()
		{
			if ($this->type->getId() == 1) {
				$tags = '';
			}else{
				$tags = '</select>';
			}
			return $tags;
		}

		public function nombrePropositions()
		{
			return count($this->propositions);
		}

		public function formaterReponse($numProposition)
		{
			$reponse = $this->propositions[$numProposition];
			if ($this->type->getId() == 1) {
				$reponseFormatee = '<div class="radio"><label><input type="radio" name="'.$this->id.'" id="'.$this->id.'-'.$reponse->getId().'" value="'.$reponse->getId().'" required>'.$reponse->getValeur().'</label></div>';
			} else {
				$reponseFormatee = '<option value="'.$reponse->getId().'">'.$reponse->getValeur().'</option>';
			}
			return $reponseFormatee;
		}

}

?>