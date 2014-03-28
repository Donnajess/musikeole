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
				$reqReponse = $this->connexion->getConnexion()->prepare('INSERT INTO propositionssondages VALUES (0, ?, ?)');
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

	}

?>