<?php

	/**
	* Classe manager de la gestion des contenus
	*/
	class ManagerContenu
	{
		
		protected $connexion;

		/**
		 * Constructeur
		 */
		function __construct()
		{
			$this->connexion = new ConnexionBDD();
		}

		public function enregistrerTexteMusikEole($pfichier, $ptexte)
		{
			$fichier = fopen('../data/contenu/musikeole/'.$pfichier, 'r+');
			ftruncate($fichier, 0);
			fseek($fichier, 0);
			fputs($fichier, $ptexte);
			fclose($fichier);
		}

		public function getTextesMusikEole()
		{
			$nomsFichiers = array('presentation', 'accueil', 'association');
			$textes = array();
			foreach ($nomsFichiers as $nomFichier) {
				$fichier = fopen('../data/contenu/musikeole/'.$nomFichier.'.txt', 'r');
				$contenu = '';
				while ($ligne = fgets($fichier)) {
					$contenu.=$ligne;
				}
				$textes[$nomFichier] = $contenu;
				fclose($fichier);
			}
			$reqAdresse = $this->connexion->getConnexion()->prepare('SELECT * FROM adresse');
			$reqAdresse->execute();
			$resAdresse = $reqAdresse->fetch();
			$textes['coordonnees'] = new Adresse($resAdresse['rue'], $resAdresse['codePostal'], $resAdresse['ville'], $resAdresse['telephone'], $resAdresse['mail']);
			return $textes;
		}

		public function modifierAdresseMusikEole($rue, $codePostal, $ville, $telephone, $mail)
		{
			$reqSuppression = $this->connexion->getConnexion()->prepare('DELETE FROM adresse');
			$reqSuppression->execute(array());
			$reqAdresse = $this->connexion->getConnexion()->prepare('INSERT INTO adresse VALUES (?, ?, ?, ?, ?)');
			$reqAdresse->execute(array($rue, $codePostal, $ville, $telephone, $mail));
		}

		public function creerMembreBureau($membre, $photo)
		{
			$info = $this->enregistrerImage($photo);
			if ($info[0]) {
				$reqMembre = $this->connexion->getConnexion()->prepare('INSERT INTO membresBureau VALUES (0, ?, ?, ?, ?, ?, ?, ?)');
				$reqMembre->execute(array($membre->getNom(), $membre->getPrenom(), $membre->getRole(), $membre->getActivite(), $membre->getDateEntree(), $info[1], $membre->getIndice()));
			}
			return $info;
		}

		function enregistrerImage($image, $nomImage = false){
			if($image['error'] = 0){
				$info = array(false, 'Erreur lors du transfert de l\'image');
			}else{
				$extensions_valides = array('jpg','jpeg');
				$extension_upload = strtolower(substr(strrchr($image['name'],'.'),1));
				if(in_array($extension_upload,$extensions_valides)){
					if (!$nomImage) {
						$nomImage = md5(uniqid(rand(), true));
						$nomImage = $nomImage.'.jpg';
					}
					$this->creerImage($image, $nomImage, 200, '../data/images/membresBureau/');
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

		public function getMembresBureau()
		{
			$reqMembres = $this->connexion->getConnexion()->prepare('SELECT * FROM membresBureau ORDER BY indice DESC, nom');
			$reqMembres->execute();
			$membresBureau = array();
			while ($ligne = $reqMembres->fetch()) {
				$membre = new MembreBureau($ligne['nom'], $ligne['prenom'], $ligne['role'], $ligne['dateEntree'], $ligne['indice'], $ligne['activite']);
				$membre->setId($ligne['id']);
				$membre->setPhoto($ligne['photo']);
				array_push($membresBureau, $membre);
			}
			return $membresBureau;
		}

		public function supprimerMembreBureau($id)
		{
			$reqNomPhoto = $this->connexion->getConnexion()->prepare('SELECT photo FROM membresBureau WHERE id = ?');
			$reqNomPhoto->execute(array($id));
			$nomPhoto = $reqNomPhoto->fetch();
			$this->supprimerImageMembreBureau($nomPhoto['photo']);
			$reqSuppression = $this->connexion->getConnexion()->prepare('DELETE FROM membresBureau WHERE id=?');
			$reqSuppression->execute(array($id));
		}

		public function supprimerImageMembreBureau($nomImage)
		{
			$fichier = '../data/images/membresBureau/'.$nomImage;
			if (file_exists($fichier)) {
				unlink($fichier);
			}
		}

		public function getMembreBureau($id)
		{
			$reqMembre = $this->connexion->getConnexion()->prepare('SELECT * FROM membresBureau WHERE id = ?');
			$reqMembre->execute(array($id));
			$ligne = $reqMembre->fetch();
			$date = explode('-', $ligne['dateEntree']);
			$date = $date[2].'-'.$date[1].'-'.$date[0];
			$membre = new MembreBureau($ligne['nom'], $ligne['prenom'], $ligne['role'], $date, $ligne['indice'], $ligne['activite']);
			$membre->setId($ligne['id']);
			$membre->setPhoto($ligne['photo']);
			return $membre;
		}

		public function modifierMembreBureau($membre)
		{
			$reqModification = $this->connexion->getConnexion()->prepare('UPDATE membresBureau SET nom = ?, prenom = ?, role = ?, activite = ?, dateEntree = ?, indice = ? WHERE id = ?');
			$reqModification->execute(array($membre->getNom(), $membre->getPrenom(), $membre->getRole(), $membre->getActivite(), $membre->getDateEntree(), $membre->getIndice(), $membre->getId()));
		}

		public function modifierPhotoMembre($id, $photo)
		{
			$reqNomPhoto = $this->connexion->getConnexion()->prepare('SELECT photo FROM membresBureau WHERE id = ?');
			$reqNomPhoto->execute(array($id));
			$nomPhoto = $reqNomPhoto->fetch();
			$nomPhoto = $nomPhoto['photo'];
			$this->supprimerImageMembreBureau($nomPhoto);
			$info = $this->enregistrerImage($photo, $nomPhoto);
			return $info;
		}

		public function supprimerBanniere($nomImage)
		{
			$fichier = '../data/images/bannieres/'.$nomImage;
			if (file_exists($fichier)) {
				unlink($fichier);
			}
		}

		public function changerBanniere($zone, $image)
		{
			if($image['error'] = 0){
				$info = array(false, 'Erreur lors du transfert de l\'image');
			}else{
				$extensions_valides = array('jpg','jpeg');
				$extension_upload = strtolower(substr(strrchr($image['name'],'.'),1));
				if(in_array($extension_upload,$extensions_valides)){
					$this->supprimerBanniere($zone.'.jpg');
					$this->creerImage($image, $zone.'.jpg', 1000, '../data/images/bannieres/');
					$info = array(true, $zone);					
				}else{
					$info = array(false, 'Le fichier uploadé n\'est pas une image jpeg.');
				}
			}
			return $info;
		}

		public function enregistrerPDF($nomFichier, $fichier)
		{
			if($fichier['error'] = 0){
				$info = array(false, 'Erreur lors du transfert du fichier');
			}else{
				$extensions_valides = array('pdf');
				$extension_upload = strtolower(substr(strrchr($fichier['name'],'.'),1));
				if(in_array($extension_upload,$extensions_valides)){
					$this->supprimerPDFReglement($nomFichier.'.pdf');
					$resultat = move_uploaded_file($fichier['tmp_name'], '../data/contenu/legal/'.$nomFichier.'.pdf');
					if ($resultat) {
						$info = array(true, $nomFichier);
					}else{
						$info = array(false, 'Le fichier n\'a pas pu être enregistré.');
					}
				}else{
					$info = array(false, 'Le fichier uploadé n\'est pas un document .pdf.');
				}
			}
			return $info;
		}

		public function supprimerPDFReglement($nomPDF)
		{
			$fichier = '../data/contenu/legal/'.$nomPDF;
			if (file_exists($fichier)) {
				unlink($fichier);
			}
		}

	}

?>