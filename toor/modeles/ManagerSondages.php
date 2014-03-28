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
		 * récupère tous les sondages
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

		public function creerPropositions($pReponses, $pidQuestion)
		{
			foreach ($pReponses as $reponse) {
				$reqReponse = $this->connexion->getConnexion()->prepare('INSERT INTO propositionssondages VALUES (0, ?, ?)');
				$reqReponse->execute(array($reponse->getValeur(), $pidQuestion));
			}
		}

		public function supprimerSondage($pid)
		{
			$reqSuppression = $this->connexion->getConnexion()->prepare('DELETE FROM sondages WHERE id = ?');
			$reqSuppression->execute(array($pid));
		}

		public function activerSondage($pid)
		{
			$reqEnleverSondageActif = $this->connexion->getConnexion()->prepare('UPDATE sondages SET actif = 0 WHERE actif = 1');
			$reqEnleverSondageActif->execute();
			$reqNouveauSondageActif = $this->connexion->getConnexion()->prepare('UPDATE sondages SET actif = 1 WHERE id = ?');
			$reqNouveauSondageActif->execute(array($pid));
			$reqTitreSondage = $this->connexion->getConnexion()->prepare('SELECT titre FROM sondages WHERE id = ?');
			$reqTitreSondage->execute(array($pid));
			$res = $reqTitreSondage->fetch();
			return $res['titre'];
		}

	}

?>