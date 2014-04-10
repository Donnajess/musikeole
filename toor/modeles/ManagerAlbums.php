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

		public function enregistrerAlbum($nom, $manifestation, $photos){
			$reqAlbum = $this->connexion->getConnexion()->prepare('INSERT INTO albums VALUES (0, ?, ?)');
			$reqAlbum->execute(array($nom, $manifestation));
			$idAlbum = $this->connexion->getConnexion()->lastInsertId();
			$info = $this->enregistrerPhotos($idAlbum, $photos);
			$info = ($info > 0) ? array(false, $info.' photo(s) non enregistrée(s) suite à des erreurs.') : array(true, $idAlbum) ;
		}

		public function enregistrerPhotos($album, $photos)
		{
			$nbPhotos = count($photos['name']);
			$nbErreurs = 0;
			for ($i=0; $i < $nbPhotos; $i++) { 
				if($photos['error'][$i] = 0){
					$nbErreurs++;
				}else{
					$extensions_valides = array('jpg','jpeg');
					$extension_upload = strtolower(substr(strrchr($photos['name'][$i],'.'),1));
					if(in_array($extension_upload,$extensions_valides)){
						$nomImage = md5(uniqid(rand(), true));
						$nomImage = $nomImage.'.jpg';
						$this->creerImage($photos, $i, $nomImage, 1000, '../data/images/photos/');
						$this->creerImage($photos, $i, $nomImage, 300, '../data/images/photos/miniatures/');
						$reqPhoto = $this->connexion->getConnexion()->prepare('INSERT INTO photos VALUES (0, ?, ?)');
						$reqPhoto->execute(array($nomImage, $album));
					}else{
						$nbErreurs++;
					}
				}
			}
			return $nbErreurs;
		}

		function creerImage($photos, $idPhoto, $nomImage, $largeur, $dossier){
			$imageRedimensionnee = imagecreatefromjpeg($photos['tmp_name'][$idPhoto]);
			$tailleImage = getimagesize($photos['tmp_name'][$idPhoto]);
			$reduction = ($largeur * 100)/$tailleImage[0];
			$hauteur = (($tailleImage[1] * $reduction)/100);
			$imageFinale = imagecreatetruecolor($largeur , $hauteur);
			imagecopyresampled($imageFinale , $imageRedimensionnee, 0, 0, 0, 0, $largeur, $hauteur, $tailleImage[0],$tailleImage[1]);
			imagejpeg($imageFinale, $dossier.$nomImage, 100);
		}

		public function getAlbums()
		{
			$reqAlbums = $this->connexion->getConnexion()->prepare('SELECT * FROM albums WHERE id > 0 ORDER BY id DESC');
			$reqAlbums->execute();
			$albums = array();
			while ($ligne = $reqAlbums->fetch()) {
				$photos = $this->getPhotosAleatoire($ligne['id'], 4);
				array_push($albums, new Album($ligne['id'], $ligne['nom'], $photos));
			}
			return $albums;
		}

		public function getPhotosAleatoire($album, $nbPhotos)
		{
			$reqPhotos = $this->connexion->getConnexion()->prepare('SELECT * FROM photos WHERE idAlbum = ? ORDER BY Rand() LIMIT '.$nbPhotos);
			$reqPhotos->execute(array($album));
			$photos = array();
			while ($ligne = $reqPhotos->fetch()) {
				array_push($photos, new Photo($ligne['id'], $ligne['nom']));
			}
			return $photos;
		}

		public function getAlbum($id)
		{
			$reqAlbum = $this->connexion->getConnexion()->prepare('SELECT * FROM albums WHERE id = ?');
			$reqAlbum->execute(array($id));
			$ligne = $reqAlbum->fetch();
			$photos = $this->getPhotosAlbum($id);
			$album = new Album($id, $ligne['nom'], $photos);
			if ($ligne['idManifestation'] > 0) {
				$manif = $this->getManifestation($ligne['idManifestation']);
				$album->setManifestation($manif);
			}
			return $album;
		}

		public function getManifestation($id)
		{
			$reqManif = $this->connexion->getConnexion()->prepare('SELECT * FROM manifestations WHERE id = ?');
			$reqManif->execute(array($id));
			$ligne = $reqManif->fetch();
			$manif = new Manifestation($ligne['id'], $ligne['nom'], $ligne['description'], $this->formatDate($ligne['dateManif']), $ligne['heure'], $ligne['places'], $ligne['image'], $ligne['gratuit'], $ligne['prixAdherent'], $ligne['prixExterieur'], $ligne['prixEnfant'], $this->getAssociation($ligne['idAssociation']));
			return $manif;
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

		public function supprimerPhoto($id)
		{
			$reqFichier = $this->connexion->getConnexion()->prepare('SELECT nom FROM photos WHERE id = ?');
			$reqFichier->execute(array($id));
			$fichier = $reqFichier->fetch();
			$this->supprimerFichier('../data/images/photos/'.$fichier['nom']);
			$this->supprimerFichier('../data/images/photos/miniatures/'.$fichier['nom']);
			$reqPhoto = $this->connexion->getConnexion()->prepare('DELETE FROM photos WHERE id = ?');
			$reqPhoto->execute(array($id));
		}

		public function supprimerFichier($chemin)
		{
			if (file_exists($chemin)) {
				unlink($chemin);
			}
		}

		public function getAlbumDeLaPhoto($idPhoto)
		{
			$reqIdAlbum = $this->connexion->getConnexion()->prepare('SELECT idAlbum FROM photos WHERE id = ?');
			$reqIdAlbum->execute(array($idPhoto));
			$idAlbum = $reqIdAlbum->fetch();
			return $idAlbum['idAlbum'];
		}

	}

?>