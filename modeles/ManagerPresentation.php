<?php

	/**
	* Manager de la page présentation en front-end
	*/
	class ManagerPresentation
	{
		
		protected $connexion;

		/**
		 * Constructeur
		 */
		function __construct()
		{
			$this->connexion = new ConnexionBDD();
		}

		public function getPresentationMusikEole()
		{
			$fichier = fopen('data/contenu/musikeole/association.txt', 'r');
			$presentation = '';
			while ($ligne = fgets($fichier)) {
				$presentation.=$ligne;
			}
			fclose($fichier);
			return $presentation;
		}

		public function getPresentationEcoleMusique()
		{
			$fichier = fopen('data/contenu/associations/presentationEcole.txt', 'r');
			$presentation = '';
			while ($ligne = fgets($fichier)) {
				$presentation.=$ligne;
			}
			fclose($fichier);
			return $presentation;
		}

		public function getAssociations()
		{
			$reqAssociations = $this->connexion->getConnexion()->prepare('SELECT * FROM associations WHERE id > 0 ORDER BY indice DESC, nom');
			$reqAssociations->execute();
			$listeAssociations = array();
			while ($ligne = $reqAssociations->fetch()) {
				array_push($listeAssociations, new Association($ligne['id'], $ligne['nom'], $ligne['fichier'], $ligne['indice'], 'data/contenu/associations/'));
			}
			return $listeAssociations;
		}

		public function getPresentationAssociation($id)
		{
			$reqFichier = $this->connexion->getConnexion()->prepare('SELECT fichier FROM associations WHERE id = ?');
			$reqFichier->execute(array($id));
			$fichier = $reqFichier->fetch();
			return $this->getTexte($fichier['fichier']);
		}

		public function getTexte($nomFichier)
		{
			$fichier = fopen('data/contenu/associations/'.$nomFichier, 'r');
			$presentation = '';
			while ($ligne = fgets($fichier)) {
				$presentation.=$ligne;
			}
			fclose($fichier);
			return $presentation;
		}

		public function getMembresBureau()
		{
			$reqMembres = $this->connexion->getConnexion()->prepare('SELECT * FROM membresbureau ORDER BY indice DESC, nom, prenom');
			$reqMembres->execute();
			$membres = array();
			while ($ligne = $reqMembres->fetch()) {
				$membre = new MembreBureau($ligne['nom'], $ligne['prenom'], $ligne['role'], $ligne['dateEntree'], $ligne['indice'], $ligne['activite']);
				$membre->setPhoto($ligne['photo']);
				array_push($membres, $membre);
			}
			return $membres;
		}

	}

?>