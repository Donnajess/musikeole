<?php

	// Classes à charger
	include($_SERVER['DOCUMENT_ROOT'].'/web/musikeole/modeles/ConnexionBDD.php');
	include($_SERVER['DOCUMENT_ROOT'].'/web/musikeole/includes/packageSondages.php');

	/**
	* Classe manager de la fonctionnalité des sondages
	*/
	class ManagerSondages
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
		 * récupère tous les sondages dans la base de données
		 * @return array<Sondage> liste des sondages
		 */
		public function getSondages()
		{
			$liste = array();
			$reqSondages = $this->connexion->getConnexion()->prepare('SELECT * FROM sondages ORDER BY actif DESC, id DESC');
			$reqSondages->execute();
			while ($ligne = $reqSondages->fetch()) {
				array_push($liste, new Sondage($ligne['id'], $ligne['titre'], $ligne['votants'], $ligne['dateCreation'], $ligne['actif']));
			}
			return $liste;
		}

		/**
		 * Enregistre un sondage dans la base de données
		 * @param  Sondage $psondage l'objet sondage à enregistrer
		 */
		public function creerSondage($psondage)
		{
			$reqEnleverSondageActif = $this->connexion->getConnexion()->prepare('UPDATE sondages SET actif = 0 WHERE actif = 1');
			$reqEnleverSondageActif->execute();
			$reqSondage = $this->connexion->getConnexion()->prepare('INSERT INTO sondages VALUES (0, ?, 0, NOW(), 1)');
			$reqSondage->execute(array($psondage->getTitre()));
			$idSondage = $this->connexion->getConnexion()->lastInsertId();
			$questions = $psondage->getQuestions();
			$this->creerQuestions($questions, $idSondage);
		}

		/**
		 * Enregiste les questions d'un sondage à la base de données
		 * @param  array<Question> $pquestions 		liste des questions à ajouter
		 * @param  int $pidSondage 					identifiant du sondage correspondant
		 */
		public function creerQuestions($pquestions, $pidSondage)
		{
			foreach ($pquestions as $question) {
				$reqQuestion = $this->connexion->getConnexion()->prepare('INSERT INTO questions VALUES (0, ?, ?, ?)');
				$idType = $question->getType()->getId();
				$reqQuestion->execute(array($question->getValeur(), $idType, $pidSondage));
				$idQuestion = $this->connexion->getConnexion()->lastInsertId();
				$propositions = $question->getPropositions();
				$this->creerPropositions($propositions, $idQuestion);
			}
		}

		/**
		 * Enregistre les propositions des questions à la base de données
		 * @param  array<Proposition> $pReponses    liste des propositions d'une question
		 * @param  int $pidQuestion 				identifiant de la question
		 */
		public function creerPropositions($pReponses, $pidQuestion)
		{
			foreach ($pReponses as $reponse) {
				$reqReponse = $this->connexion->getConnexion()->prepare('INSERT INTO propositionssondages VALUES (0, ?, 0, ?)');
				$reqReponse->execute(array($reponse->getValeur(), $pidQuestion));
			}
		}

		/**
		 * Supprime un sondage de la base de données
		 * @param  int $pid identifiant du sondage à supprimer
		 */
		public function supprimerSondage($pid)
		{
			$reqSuppression = $this->connexion->getConnexion()->prepare('DELETE FROM sondages WHERE id = ?');
			$reqSuppression->execute(array($pid));
		}

		/**
		 * Ouvre un sondage aux votes dans la partie Front-End. Renvoie le nom du sondage qui a été activé. Il ne peut y avoir qu'un seul sondage actif à la fois.
		 * @param  int $pid 		  identifiant du sondage à activer
		 * @return string $titre      titre du sondage qui a été activé
		 */
		public function activerSondage($pid)
		{
			$reqEnleverSondageActif = $this->connexion->getConnexion()->prepare('UPDATE sondages SET actif = 0 WHERE actif = 1');
			$reqEnleverSondageActif->execute();
			$reqNouveauSondageActif = $this->connexion->getConnexion()->prepare('UPDATE sondages SET actif = 1 WHERE id = ?');
			$reqNouveauSondageActif->execute(array($pid));
			$reqTitreSondage = $this->connexion->getConnexion()->prepare('SELECT titre FROM sondages WHERE id = ?');
			$reqTitreSondage->execute(array($pid));
			$res = $reqTitreSondage->fetch();
			$titre = $res['titre'];
			return $titre;
		}

		/**
		 * Rècupère un sondage et ses résultats dans la base de données
		 * @param  int $pid 			 identifiant du sondage à récupérer
		 * @return Sondage $sondage      objet sondage avec les résultats
		 */
		public function getSondage($pid)
		{
			$reqSondage = $this->connexion->getConnexion()->prepare('SELECT * FROM sondages WHERE id = ?');
			$reqSondage->execute(array($pid));
			$resSondage = $reqSondage->fetch();
			$sondage = new Sondage($resSondage['id'], $resSondage['titre'], $resSondage['votants'], $resSondage['dateCreation'], $resSondage['actif']);
			$listeQuestions = $this->getQuestions($pid);
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

	}

?>