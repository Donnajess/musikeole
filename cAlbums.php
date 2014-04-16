<?php
	session_start();

	function __autoload($class)
	{
		static $classDir = '/modeles';
		$file = str_replace('\\', DIRECTORY_SEPARATOR, ltrim($class, '\\')) . '.php';
		require "$classDir/$file";
	}

	// Chargement des classes
	include('modeles/ConnexionBDD.php');
	include('modeles/contenus/Association.php');
	include('modeles/agenda/Manifestation.php');
	include('modeles/albums/Album.php');
	include('modeles/albums/Photo.php');
	include('modeles/ManagerAlbums.php');

	$manager = new ManagerAlbums();

	if (isset($_GET['action'])) {
		$action = htmlentities($_GET['action']);
	}else{
		$action = 'index';
	}

	$page = 'photos';

	switch ($action) {

		case 'album':
			$album = $manager->getAlbum($_GET['id']);
			if (isset($_SESSION['idAutorisation']) && $_SESSION['idAutorisation'] > 1) {
				include('vues/albums/detail.php');
			}else {
				include('vues/albums/erreur.php');
			}
			break;

		default:
			$albums = $manager->getAlbums();
			include('vues/albums/index.php');
			break;

	}

?>