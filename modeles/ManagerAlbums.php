<?php

	/**
	* Manager de la galerie photos en front-end
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

		public function getAlbum($id)
		{
			return true;
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

	}

?>