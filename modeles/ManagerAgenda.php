<?php

	/**
	* Manager de l'agenda en front-end
	*/
	class ManagerAgenda
	{
		
		protected $connexion;

		/**
		 * Constructeur
		 */
		function __construct()
		{
			$this->connexion = new ConnexionBDD();
		}

		public function getManifestationsAVenir()
		{
			$reqManifs = $this->connexion->getConnexion()->prepare('SELECT * FROM manifestations WHERE valide = 1 AND dateManif >= NOW() ORDER BY dateManif, idAssociation');
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
			$asso =  new Association($association['id'], $association['nom'], $association['fichier'], $association['indice'], '/data/contenu/associations/');
			return $asso;
		}

		public function getHistorique()
		{
			$reqManifs = $this->connexion->getConnexion()->prepare('SELECT * FROM manifestations WHERE valide = 1 AND dateManif < NOW() AND id > 0 ORDER BY dateManif DESC, idAssociation');
			$reqManifs->execute();
			$manifs = array();
			while ($ligne = $reqManifs->fetch()) {
				$manif = new Manifestation($ligne['id'], $ligne['nom'], $ligne['description'], $this->formatDate($ligne['dateManif']), $ligne['heure'], $ligne['places'], $ligne['image'], $ligne['gratuit'], $ligne['prixAdherent'], $ligne['prixExterieur'], $ligne['prixEnfant'], $this->getAssociation($ligne['idAssociation']));
				if ($ligne['idAlbum'] > 0) {
					$album = $this->getAlbum($ligne['idAlbum']);
					$manif->setAlbum($album);
				}
				array_push($manifs, $manif);
			}
			return $manifs;
		}

		public function getAlbum($id)
		{
			$reqAlbum = $this->connexion->getConnexion()->prepare('SELECT * FROM albums WHERE id = ?');
			$reqAlbum->execute(array($id));
			$ligne = $reqAlbum->fetch();
			$photos = $this->getPhotosAlbum($id);
			$album = new Album($id, $ligne['nom'], $photos);
			return $album;
		}

		public function getPhotosAlbum($album)
		{
			$reqPhotos = $this->connexion->getConnexion()->prepare('SELECT * FROM photos WHERE idAlbum = ? ORDER BY id');
			$reqPhotos->execute(array($album));
			$photos = array();
			while ($ligne = $reqPhotos->fetch()) {
				array_push($photos, new Photo($ligne['id'], $ligne['nom']));
			}
			return $photos;
		}

		public function getManifestation($id)
		{
			$reqManif = $this->connexion->getConnexion()->prepare('SELECT * FROM manifestations WHERE id =?');
			$reqManif->execute(array($id));
			$ligne = $reqManif->fetch();
			$manif = new Manifestation($ligne['id'], $ligne['nom'], $ligne['description'], $this->formatDate($ligne['dateManif']), $ligne['heure'], $ligne['places'], $ligne['image'], $ligne['gratuit'], $ligne['prixAdherent'], $ligne['prixExterieur'], $ligne['prixEnfant'], $this->getAssociation($ligne['idAssociation']));
			return $manif;
		}

	}

?>