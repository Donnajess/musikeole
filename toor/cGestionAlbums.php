<?php
	session_start();

	function __autoload($class)
	{
		static $classDir = '/modeles';
		$file = str_replace('\\', DIRECTORY_SEPARATOR, ltrim($class, '\\')) . '.php';
		require "$classDir/$file";
	}

	// Chargement des classes
	include('../modeles/ConnexionBDD.php');
	include('../modeles/contenus/Association.php');
	include('../modeles/agenda/Manifestation.php');
	include('../modeles/albums/Album.php');
	include('../modeles/albums/Photo.php');
	include('modeles/ManagerAlbums.php');

	$manager = new ManagerAlbums();

	if (isset($_GET['action'])) {
		$action = htmlentities($_GET['action']);
	}else{
		$action = 'index';
	}

	switch ($action) {

		case 'creerAlbum':
			$info = $manager->enregistrerAlbum($_POST['nom'], $_POST['manifestation'], $_FILES['photos']);
			$message = ($info[0]) ? 'L\'album photo "'.$_POST['nom'].'" a été créé.' : $info[1] ;
			$manifestations = $manager->getManifestations();
			$albums = $manager->getAlbums();
			include('vues/albums/index.php');
			break;

		case 'index':
			$manifestations = $manager->getManifestations();
			$albums = $manager->getAlbums();
			include('vues/albums/index.php');
			break;

		default:
			$manifestations = $manager->getManifestations();
			$albums = $manager->getAlbums();
			include('vues/albums/index.php');
			break;

	}

?>