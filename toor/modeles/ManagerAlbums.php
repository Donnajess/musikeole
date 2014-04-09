<?php

	/**
	* Classe manager des albums photo en back-end
	*/
	class ManagerAlbums
	{
		
		protected $connexion;

		/**
		 * Constructeur
		 */
		function __construct()
		{
			$this->connexion = new ConnexionBDD();
		}

		public function getManifestations()
		{
			$reqManifs = $this->connexion->getConnexion()->prepare('SELECT * FROM manifestations WHERE valide = 1 AND dateManif < NOW() ORDER BY dateManif DESC, idAssociation');
			$reqManifs->execute();
			$manifs = array();
			while ($ligne = $reqManifs->fetch()) {
				$manif = new Manifestation($ligne['id'], $ligne['nom'], $ligne['description'], $this->formatDate($ligne['dateManif']), $ligne['heure'], $ligne['places'], $ligne['image'], $ligne['gratuit'], $ligne['prixAdherent'], $ligne['prixExterieur'], $ligne['prixEnfant'], $this->getAssociation($ligne['idAssociation']));
				array_push($manifs, $manif);
			}
			return $manifs;
		}

		public function formatDate($date)
		{
			$arrayDate = explode('-', $date);
			$dateFormatee = $arrayDate[2].'-'.$arrayDate[1].'-'.$arrayDate[0];
			return $dateFormatee;
		}

		public function getAssociation($id)
		{
			$reqAssociations = $this->connexion->getConnexion()->prepare('SELECT * FROM associations WHERE id = ?');
			$reqAssociations->execute(array($id));
			$association = $reqAssociations->fetch();
			$asso =  new Association($association['id'], $association['nom'], $association['fichier'], $association['indice'], '../data/contenu/associations/');
			return $asso;
		}

	}

?>