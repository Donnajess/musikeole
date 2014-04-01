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

		function enregistrerImage($image){
			if($image['error'] = 0){
				$info = array(false, 'Erreur lors du transfert de l\'image');
			}else{
				$extensions_valides = array('jpg','jpeg');
				$extension_upload = strtolower(substr(strrchr($image['name'],'.'),1));
				if(in_array($extension_upload,$extensions_valides)){
					$nomImage = md5(uniqid(rand(), true));
					$nomImage = $nomImage.".".$extension_upload;
					$this->creerImage($image, $nomImage);
					$info = array(true, $nomImage);
				}else{
					$info = array(false, 'Le fichier uploadé n\'est pas une image jpeg.');
				}
			}
			return $info;
		}

		function creerImage($image, $nomImage){
			$largeur = 200;
			$dossier = "../data/images/membresBureau/";

			$imageRedimensionnee = imagecreatefromjpeg($image['tmp_name']);
			$tailleImage = getimagesize($image['tmp_name']);
			$reduction = ($largeur * 100)/$tailleImage[0];
			$hauteur = (($tailleImage[1] * $reduction)/100);
			$imageFinale = imagecreatetruecolor($largeur , $hauteur);
			imagecopyresampled($imageFinale , $imageRedimensionnee, 0, 0, 0, 0, $largeur, $hauteur, $tailleImage[0],$tailleImage[1]);
			imagejpeg($imageFinale, $dossier.$nomImage.'.jpg', 100);
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

	}

?>