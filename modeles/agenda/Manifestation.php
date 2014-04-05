<?php

	/**
	* Classe représentant une manifestation
	*/
	class Manifestation
	{

		protected $id;
		protected $nom;
		protected $description;
		protected $date;
		protected $heure;
		protected $places;
		protected $image;
		protected $gratuit;
		protected $prixAdherent;
		protected $prixExterieur;
		protected $prixEnfant;
		protected $dateCreation;
		protected $valide;
		protected $association;
		protected $album;
		protected $membreOrganisateur;

		function __construct($pid, $pnom, $pdescription, $pdate, $pheure, $pplaces, $pimage, $pgratuit, $pprixAdherent, $pprixExterieur, $pprixEnfant, $passociation)
		{
			$this->id = $pid;
			$this->nom = $pnom;
			$this->description = $pdescription;
			$this->date = $pdate;
			$this->heure = $pheure;
			$this->places = $pplaces;
			$this->image = $pimage;
			$this->gratuit = $pgratuit;
			$this->prixAdherent = $pprixAdherent;
			$this->prixExterieur = $pprixExterieur;
			$this->prixEnfant = $pprixEnfant;
			$this->association = $passociation;
		}
	
		/**
		* Accesseur de id.
		* @return int
		*/
		public function getId()
		{
			return $this->id;
		}

		/**
		* Mutateur de id.
		* @param int $id  id
		*/
		public function setId($id)
		{
			$this->id = $id;
		}

		/**
		* Accesseur de nom.
		* @return string
		*/
		public function getNom()
		{
			return $this->nom;
		}

		/**
		* Mutateur de nom.
		* @param string $nom  nom
		*/
		public function setNom($nom)
		{
			$this->nom = $nom;
		}

		/**
		* Accesseur de description.
		* @return string
		*/
		public function getDescription()
		{
			return $this->description;
		}

		/**
		* Mutateur de description.
		* @param string $description  description
		*/
		public function setDescription($description)
		{
			$this->description = $description;
		}

		/**
		* Accesseur de date.
		* @return date
		*/
		public function getDate()
		{
			return $this->date;
		}

		/**
		 * Renvoie la date au format MySQL (yy-mm-dd)
		 * @return string date MySQL
		 */
		public function getDateMysql()
		{
			$dateMysql = explode('-', $this->date);
			$date = $dateMysql[2].'-'.$dateMysql[1].'-'.$dateMysql[0];
			return $date;
		}

		/**
		* Mutateur de date.
		* @param date $date  date
		*/
		public function setDate($date)
		{
			$this->date = $date;
		}

		/**
		* Accesseur de heure.
		* @return string
		*/
		public function getHeure()
		{
			return $this->heure;
		}

		/**
		* Mutateur de heure.
		* @param string $heure  heure
		*/
		public function setHeure($heure)
		{
			$this->heure = $heure;
		}

		/**
		* Accesseur de places.
		* @return int
		*/
		public function getPlaces()
		{
			return $this->places;
		}

		/**
		* Mutateur de places.
		* @param int $places  places
		*/
		public function setPlaces($places)
		{
			$this->places = $places;
		}

		/**
		* Accesseur de image.
		* @return string
		*/
		public function getImage()
		{
			return $this->image;
		}

		/**
		* Mutateur de image.
		* @param string $image  image
		*/
		public function setImage($image)
		{
			$this->image = $image;
		}

		/**
		* Accesseur de gratuit.
		* @return bool
		*/
		public function getGratuit()
		{
			return $this->gratuit;
		}

		/**
		* Mutateur de gratuit.
		* @param bool $gratuit  gratuit
		*/
		public function setGratuit($gratuit)
		{
			$this->gratuit = $gratuit;
		}

		/**
		* Accesseur de prix adherent.
		* @return double
		*/
		public function getPrixAdherent()
		{
			return $this->prixAdherent;
		}

		/**
		* Mutateur de prix adherent.
		* @param double $prixAdherent  prix adherent
		*/
		public function setPrixAdherent($prixAdherent)
		{
			$this->prixAdherent = $prixAdherent;
		}

		/**
		* Accesseur de prix exterieur.
		* @return double
		*/
		public function getPrixExterieur()
		{
			return $this->prixExterieur;
		}

		/**
		* Mutateur de prix exterieur.
		* @param double $prixExterieur  prix exterieur
		*/
		public function setPrixExterieur($prixExterieur)
		{
			$this->prixExterieur = $prixExterieur;
		}

		/**
		* Accesseur de prix enfant.
		* @return double
		*/
		public function getPrixEnfant()
		{
			return $this->prixEnfant;
		}

		/**
		* Mutateur de prix enfant.
		* @param double $prixEnfant  prix enfant
		*/
		public function setPrixEnfant($prixEnfant)
		{
			$this->prixEnfant = $prixEnfant;
		}

		/**
		* Accesseur de date creation.
		* @return date
		*/
		public function getDateCreation()
		{
			return $this->dateCreation;
		}

		/**
		* Mutateur de date creation.
		* @param date $dateCreation  date creation
		*/
		public function setDateCreation($dateCreation)
		{
			$this->dateCreation = $dateCreation;
		}

		/**
		* Accesseur de valide.
		* @return bool
		*/
		public function getValide()
		{
			return $this->valide;
		}

		/**
		* Mutateur de valide.
		* @param bool $valide  valide
		*/
		public function setValide($valide)
		{
			$this->valide = $valide;
		}

		/**
		* Accesseur de association.
		* @return Association
		*/
		public function getAssociation()
		{
			return $this->association;
		}

		/**
		* Mutateur de association.
		* @param Association $association  association
		*/
		public function setAssociation($association)
		{
			$this->association = $association;
		}

		/**
		* Accesseur de album.
		* @return Album
		*/
		public function getAlbum()
		{
			return $this->album;
		}

		/**
		* Mutateur de album.
		* @param Album $album  album
		*/
		public function setAlbum($album)
		{
			$this->album = $album;
		}

		/**
		* Accesseur de membre organisateur.
		* @return Membre
		*/
		public function getMembreOrganisateur()
		{
			return $this->membreOrganisateur;
		}

		/**
		* Mutateur de membre organisateur.
		* @param Membre $membreOrganisateur  membre organisateur
		*/
		public function setMembreOrganisateur($membreOrganisateur)
		{
			$this->membreOrganisateur = $membreOrganisateur;
		}

		public function nomFormate()
		{
			$accents = array('À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ò','Ó','Ô','Õ','Ö','Ù','Ú','Û','Ü','Ý','à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ð','ò','ó','ô','õ','ö','ù','ú','û','ü','ý','ÿ');
			$sans = array('A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','O','O','O','O','O','U','U','U','U','Y','a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','o','o','o','o','o','o','u','u','u','u','y','y');
			$chaine = str_replace($accents, $sans, $this->nom);
			$symboles = array("?","!","@","#","%","&amp;","*","(",")","[","]","=","+"," ",";",":","'",".","_","&");
			$chaine = str_replace($symboles, "-", $chaine);
			$chaine = strtolower(strip_tags($chaine));
			return $chaine;
		}

	}

?>