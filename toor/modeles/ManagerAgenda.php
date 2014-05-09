<?php

	/**
	* Classe manager de la gestion de l'agenda
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

		public function getAssociations()
		{
			$reqAssociations = $this->connexion->getConnexion()->prepare('SELECT * FROM associations ORDER BY indice DESC, nom');
			$reqAssociations->execute();
			$listeAssociations = array();
			while ($ligne = $reqAssociations->fetch()) {
				array_push($listeAssociations, new Association($ligne['id'], $ligne['nom'], $ligne['fichier'], $ligne['indice'], '../data/contenu/associations/'));
			}
			return $listeAssociations;
		}

		public function getNomFichierAleatoire()
		{
			$nomImage = md5(uniqid(rand(), true));
			$nomImage = $nomImage.'.jpg';
			return $nomImage;
		}

		public function ajouterManifestation($manifestation, $image)
		{
			$info = $this->enregistrerImageManifestation($image, $manifestation->getImage());
			if ($info[0]) {
				$reqAjout = $this->connexion->getConnexion()->prepare('INSERT INTO manifestations VALUES (0, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), 1, ?, 0, 0)');
				$reqAjout->execute(array($manifestation->getNom(), $manifestation->getDescription(), $manifestation->getDateMysql(), $manifestation->getHeure(), $manifestation->getPlaces(), $manifestation->getImage(), $manifestation->getGratuit(), $manifestation->getPrixAdherent(), $manifestation->getPrixExterieur(), $manifestation->getPrixEnfant(), $manifestation->getAssociation()));
			}
			return $info;
		}

		public function enregistrerImageManifestation($image, $nomImage)
		{
			if($image['error'] = 0){
				$info = array(false, 'Erreur lors du transfert de l\'image');
			}else{
				$extensions_valides = array('jpg','jpeg');
				$extension_upload = strtolower(substr(strrchr($image['name'],'.'),1));
				if(in_array($extension_upload,$extensions_valides)){
					$this->supprimerFichier('../data/images/manifestations/'.$nomImage);
					$this->supprimerFichier('../data/images/manifestations/miniatures/'.$nomImage);	
					$taille = getimagesize($image['tmp_name']);
					$this->creerImage($image, $nomImage, $taille[0], '../data/images/manifestations/');
					$this->creerImage($image, $nomImage, 200, '../data/images/manifestations/miniatures/');
					$info = array(true, $nomImage);
				}else{
					$info = array(false, 'Le fichier uploadé n\'est pas une image jpeg.');
				}
			}
			return $info;
		}

		function creerImage($image, $nomImage, $largeur, $dossier){		
			$imageRedimensionnee = imagecreatefromjpeg($image['tmp_name']);
			$tailleImage = getimagesize($image['tmp_name']);
			$reduction = ($largeur * 100)/$tailleImage[0];
			$hauteur = (($tailleImage[1] * $reduction)/100);
			$imageFinale = imagecreatetruecolor($largeur , $hauteur);
			imagecopyresampled($imageFinale , $imageRedimensionnee, 0, 0, 0, 0, $largeur, $hauteur, $tailleImage[0],$tailleImage[1]);
			imagejpeg($imageFinale, $dossier.$nomImage, 100);
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
			$asso =  new Association($association['id'], $association['nom'], $association['fichier'], $association['indice'], '../data/contenu/associations/');
			return $asso;
		}

		public function supprimerManifestation($id)
		{
			$reqFichier = $this->connexion->getConnexion()->prepare('SELECT image FROM manifestations WHERE id = ?');
			$reqFichier->execute(array($id));
			$fichier = $reqFichier->fetch();
			$this->supprimerFichier('../data/images/manifestations/'.$fichier['image']);
			$this->supprimerFichier('../data/images/manifestations/miniatures/'.$fichier['image']);
			$reqSuppression = $this->connexion->getConnexion()->prepare('DELETE FROM manifestations WHERE id = ?');
			$reqSuppression->execute(array($id));
		}

		public function supprimerFichier($chemin)
		{
			if (file_exists($chemin)) {
				unlink($chemin);
			}
		}

		public function getManifestationsPassees()
		{
			$reqManifs = $this->connexion->getConnexion()->prepare('SELECT * FROM manifestations WHERE valide = 1 AND dateManif < NOW()AND id > 0 ORDER BY dateManif DESC, idAssociation');
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

		public function getManifestationsEnAttente()
		{
			$reqManifs = $this->connexion->getConnexion()->prepare('SELECT * FROM manifestations WHERE valide = 0 AND dateManif >= NOW() ORDER BY dateManif');
			$reqManifs->execute();
			$manifs = array();
			while ($ligne = $reqManifs->fetch()) {
				$manif = new Manifestation($ligne['id'], $ligne['nom'], $ligne['description'], $this->formatDate($ligne['dateManif']), $ligne['heure'], $ligne['places'], $ligne['image'], $ligne['gratuit'], $ligne['prixAdherent'], $ligne['prixExterieur'], $ligne['prixEnfant'], $this->getAssociation($ligne['idAssociation']));
				array_push($manifs, $manif);
			}
			return $manifs;
		}

		public function getManifestation($id)
		{
			$reqManif = $this->connexion->getConnexion()->prepare('SELECT * FROM manifestations WHERE id = ?');
			$reqManif->execute(array($id));
			$ligne = $reqManif->fetch();
			$manif = new Manifestation($ligne['id'], $ligne['nom'], $ligne['description'], $this->formatDate($ligne['dateManif']), $ligne['heure'], $ligne['places'], $ligne['image'], $ligne['gratuit'], $ligne['prixAdherent'], $ligne['prixExterieur'], $ligne['prixEnfant'], $this->getAssociation($ligne['idAssociation']));
			return $manif;
		}

		public function modifierManifestation($manifestation)
		{
			$reqModif = $this->connexion->getConnexion()->prepare('UPDATE manifestations SET nom = ?, dateManif = ?, heure = ?, gratuit = ?, prixAdherent = ?, prixExterieur = ?, prixEnfant = ?, places = ?, idAssociation = ?, description = ? WHERE id = ?');
			$reqModif->execute(array($manifestation->getNom(), $manifestation->getDate(), $manifestation->getHeure(), $manifestation->getGratuit(), $manifestation->getPrixAdherent(), $manifestation->getPrixExterieur(), $manifestation->getPrixEnfant(), $manifestation->getPlaces(), $manifestation->getAssociation(), $manifestation->getDescription(), $manifestation->getId()));
		}

		public function getAlbumsNonAttribues()
		{
			$reqAlbums = $this->connexion->getConnexion()->prepare('SELECT * FROM albums WHERE idManifestation = 0 and id > 0 ORDER BY id DESC');
			$reqAlbums->execute();
			$albums = array();
			while ($ligne = $reqAlbums->fetch()) {
				array_push($albums, new Album($ligne['id'], $ligne['nom'], array()));
			}
			return $albums;
		}

		public function ajouterAlbum($manif, $album)
		{
			$reqManif = $this->connexion->getConnexion()->prepare('UPDATE manifestations SET idAlbum = ? WHERE id = ?');
			$reqManif->execute(array($album, $manif));
			$reqAlbum = $this->connexion->getConnexion()->prepare('UPDATE albums SET idManifestation = ? WHERE id = ?');
			$reqAlbum->execute(array($manif, $album));
		}

		public function detacherAlbum($manif)
		{
			$reqManif = $this->connexion->getConnexion()->prepare('UPDATE manifestations SET idAlbum = 0 WHERE id = ?');
			$reqManif->execute(array($manif));
			$reqAlbum = $this->connexion->getConnexion()->prepare('UPDATE albums SET idManifestation = 0 WHERE idManifestation = ?');
			$reqAlbum->execute(array($manif));
		}

	}

?>