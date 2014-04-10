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
	include('modeles/ManagerAgenda.php');

	$manager = new ManagerAgenda();

	if (isset($_GET['action'])) {
		$action = htmlentities($_GET['action']);
	}else{
		$action = 'index';
	}

	switch ($action) {

		case 'detacherAlbum':
			$manager->detacherAlbum($_GET['id']);
			$message = 'L\'album n\'est plus lié à la manifestation.';
			$manifestationsAVenir = $manager->getManifestationsAVenir();
			$manifestationsPassees = $manager->getManifestationsPassees();
			$manifestationsEnAttente = $manager->getManifestationsEnAttente();
			$albumsNonAttribues = $manager->getAlbumsNonAttribues();
			include('vues/agenda/index.php');
			break;

		case 'ajouterAlbum':
			$manager->ajouterAlbum($_POST['idManif'], $_POST['album']);
			$message = 'L\'album a été ajouté à la manifestation.';
			$manifestationsAVenir = $manager->getManifestationsAVenir();
			$manifestationsPassees = $manager->getManifestationsPassees();
			$manifestationsEnAttente = $manager->getManifestationsEnAttente();
			$albumsNonAttribues = $manager->getAlbumsNonAttribues();
			include('vues/agenda/index.php');
			break;

		case 'modifierManifestation':
			$manif = $manager->getManifestation($_GET['id']);
			$associations = $manager->getAssociations();
			include('vues/agenda/modification.php');
			break;

		case 'validerManifestation':
			$manif = new Manifestation($_POST['id'], $_POST['nom'], $_POST['description'], $manager->formatDate($_POST['date']), $_POST['heure'], $_POST['places'], $_POST['nomImage'], $_POST['gratuit'], $_POST['prixAdh'], $_POST['prixExt'], $_POST['prixEnf'], $_POST['association']);
			$manager->modifierManifestation($manif);
			$message = 'La manifestation "'.$_POST['nom'].'" a été modifiée.';
			if ($_FILES['image']['size'] > 0) {
				$info = $manager->enregistrerImageManifestation($_FILES['image'], $_POST['nomImage']);
				if (!$info[0]) {
					$message = $info[1];
				}
			}
			$manifestationsAVenir = $manager->getManifestationsAVenir();
			$manifestationsPassees = $manager->getManifestationsPassees();
			$manifestationsEnAttente = $manager->getManifestationsEnAttente();
			$albumsNonAttribues = $manager->getAlbumsNonAttribues();
			include('vues/agenda/index.php');
			break;

		case 'ajouterManifestation':
			$associations = $manager->getAssociations();
			include('vues/agenda/formulaire.php');
			break;

		case 'creerManifestation':
			$nomImage = $manager->getNomFichierAleatoire();
			$manifestation = new Manifestation(0, $_POST['nom'], $_POST['description'], $_POST['date'], $_POST['heure'], $_POST['places'], $nomImage, $_POST['gratuit'], $_POST['prixAdh'], $_POST['prixExt'], $_POST['prixEnf'], $_POST['association']);
			$info = $manager->ajouterManifestation($manifestation, $_FILES['image']);
			$message = 'La manifestation "'.$_POST['nom'].'" a été ajoutée.';
			if (!$info[0]) {
				$message = $info[1];
			}
			$manifestationsAVenir = $manager->getManifestationsAVenir();
			$manifestationsPassees = $manager->getManifestationsPassees();
			$manifestationsEnAttente = $manager->getManifestationsEnAttente();
			$albumsNonAttribues = $manager->getAlbumsNonAttribues();
			include('vues/agenda/index.php');
			break;

		case 'supprimerManifestation':
			$manager->supprimerManifestation($_GET['id']);
			$message = 'La manifestation a été supprimée';
			$manifestationsAVenir = $manager->getManifestationsAVenir();
			$manifestationsPassees = $manager->getManifestationsPassees();
			$manifestationsEnAttente = $manager->getManifestationsEnAttente();
			$albumsNonAttribues = $manager->getAlbumsNonAttribues();
			include('vues/agenda/index.php');
			break;

		case 'index':
			$manifestationsAVenir = $manager->getManifestationsAVenir();
			$manifestationsPassees = $manager->getManifestationsPassees();
			$manifestationsEnAttente = $manager->getManifestationsEnAttente();
			$albumsNonAttribues = $manager->getAlbumsNonAttribues();
			include('vues/agenda/index.php');
			break;

		default:
			$manifestationsAVenir = $manager->getManifestationsAVenir();
			$manifestationsPassees = $manager->getManifestationsPassees();
			$manifestationsEnAttente = $manager->getManifestationsEnAttente();
			$albumsNonAttribues = $manager->getAlbumsNonAttribues();
			include('vues/agenda/index.php');
			break;

	}

?>