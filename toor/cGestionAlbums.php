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

		case 'index':
			$manifestations = $manager->getManifestations();
			include('vues/albums/index.php');
			break;

		default:
			$manifestations = $manager->getManifestations();
			include('vues/albums/index.php');
			break;

	}

?>