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
			$info = ($info > 0) ? array(false, $info.' photo(s) non enregistrée(s) suite à des erreurs.') : array(true, $nom) ;
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

	}

?>