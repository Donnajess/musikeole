<?php
	session_start();

// if (isset($_SESSION['idAutorisation']) && $_SESSION['idAutorisation'] > 2) {

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

		case 'supprimerAlbum':
			$manager->supprimerAlbum($_GET['id']);
			$message = 'L\'album aété supprimé.';
			$manifestations = $manager->getManifestations();
			$albums = $manager->getAlbums();
			include('vues/albums/index.php');			
			break;

		case 'supprimerPhoto':
			$idAlbum = $manager->getAlbumDeLaPhoto($_GET['id']);
			$manager->supprimerPhoto($_GET['id']);
			$message = 'La photo a été supprimée.';
			$album = $manager->getAlbum($idAlbum);
			include('vues/albums/detail.php');
			break;

		case 'creerAlbum':
			$info = $manager->enregistrerAlbum($_POST['nom'], $_POST['manifestation'], $_FILES['photos']);
			$message = ($info[0]) ? 'L\'album photo "'.$_POST['nom'].'" a été créé.' : $info[1] ;
			$manifestations = $manager->getManifestations();
			$albums = $manager->getAlbums();
			include('vues/albums/index.php');
			break;

		case 'detailAlbum':
			if (isset($_POST['id'])) {
				$erreurs = $manager->enregistrerPhotos($_POST['id'], $_FILES['photos']);
				$message = ($erreurs > 0) ? $erreurs.' photo(s) non enregistrée(s) suite à des erreurs.' : 'Les photos ont été ajoutées.' ;
			}
			$album = $manager->getAlbum($_GET['id']);
			include('vues/albums/detail.php');
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

// }else{
// 	header('Location: ../index.php');
// 	exit();
// }

?>