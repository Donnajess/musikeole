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

	}

?>