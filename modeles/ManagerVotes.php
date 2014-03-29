<?php

	/**
	* Manager des sondages en front-end
	*/
	class ManagerVotes
	{
		
		protected $connexion;

		/**
		 * Constructeur
		 */
		function __construct()
		{
			$this->connexion = new ConnexionBDD();
		}

		/**
		 * Retourne le titre du sondage actif
		 * @return string titre du sondage
		 */
		public function getTitre()
		{
			$reqTitreSondage = $this->connexion->getConnexion()->prepare('SELECT titre FROM sondages WHERE actif = 1');
			$reqTitreSondage->execute();
			$resTitreSondage = $reqTitreSondage->fetch();
			$titre = $resTitreSondage['titre'];
			return $titre;
		}

		/**
		 * Récupère le sondage actif dans la base de données
		 * @return Sondage le sondage actif à afficher sur le site
		 */
		public function getSondage()
		{
			$reqSondage = $this->connexion->getConnexion()->prepare('SELECT * FROM sondages WHERE actif = 1');
			$reqSondage->execute();
			$resSondage = $reqSondage->fetch();
			$sondage = new Sondage($resSondage['id'], $resSondage['titre'], $resSondage['votants'], $resSondage['dateCreation'], $resSondage['actif']);
			$listeQuestions = $this->getQuestions($resSondage['id']);
			$sondage->setQuestions($listeQuestions);
			return $sondage;
		}

		/**
		 * Récupère les questions d'un sondage dans la base de données
		 * @param  int $pidSondage 			   identifiant du sondage
		 * @return array<Question>             questions du sondage
		 */
		public function getQuestions($pidSondage)
		{
			$reqQuestions = $this->connexion->getConnexion()->prepare('SELECT * FROM questions WHERE idSondage = ?');
			$reqQuestions->execute(array($pidSondage));
			$listeQuestions = array();
			while ($ligne = $reqQuestions->fetch()) {
				$question = new Question($ligne['id'], $ligne['question'], new Type($ligne['idType']));
				$listePropositions = $this->getPropositions($ligne['id']);
				$question->setPropositions($listePropositions);
				array_push($listeQuestions, $question);
			}
			return $listeQuestions;
		}

		/**
		 * Récupère les propositions d'une question (avec le nombre de votes de chaque proposition)
		 * @param  int $pidQuestion 			   identifiant de la question
		 * @return array<Proposition>              liste des propositions de la question concernée
		 */	
		public function getPropositions($pidQuestion)
		{
			$reqReponses = $this->connexion->getConnexion()->prepare('SELECT * FROM propositionssondages WHERE idQuestion = ?');
			$reqReponses->execute(array($pidQuestion));
			$listePropositions = array();
			while ($ligne = $reqReponses->fetch()) {
				$proposition = new Proposition($ligne['id'], $ligne['proposition']);
				$proposition->setVotes($ligne['votes']);
				array_push($listePropositions, $proposition);
			}
			return $listePropositions;
		}

		public function enregistrerReponse($idQuestion, $idReponse, $ip)
		{
			$reqAjout = $this->connexion->getConnexion()->prepare('INSERT INTO reponsessondages VALUES (0, ?, ?, ?)');
			$reqAjout->execute(array($ip, $idReponse, $idQuestion));
			$reqIncrementationReponse = $this->connexion->getConnexion()->prepare('UPDATE propositionssondages SET votes = votes + 1 WHERE id = ?');
			$reqIncrementationReponse->execute(array($idReponse));
		}

		public function trouverSondageAvecQuestion($idQuestion)
		{
			$reqSondage = $this->connexion->getConnexion()->prepare('SELECT idSondage FROM questions WHERE id = ?');
			$reqSondage->execute(array($idQuestion));
			$resSondage = $reqSondage->fetch();
			$idSondage = $resSondage['idSondage'];
			return $idSondage;
		}

		public function ajoutVoteSondage($idSondage)
		{
			$reqIncrementationSondage = $this->connexion->getConnexion()->prepare('UPDATE sondages SET votants = votants + 1 WHERE id = ?');
			$reqIncrementationSondage->execute(array($idSondage));
		}

	}

?>