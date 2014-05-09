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
	include('includes/packageContenus.php');
	include('modeles/ManagerContenu.php');

	$manager = new ManagerContenu();

	if (isset($_GET['action'])) {
		$action = htmlentities($_GET['action']);
	}else{
		$action = 'index';
	}

	switch ($action) {

		case 'index':
			$membresEquipe = $manager->getMembresEquipePedagogique();
			include('vues/contenu/equipePedagogique/index.php');
			break;

		case 'ajouterMembre':
			include('vues/contenu/equipePedagogique/formulaire.php');
			break;

		case 'valider':
			$membre = new MembreBureau($_POST['nom'], $_POST['prenom'], $_POST['role'], $_POST['dateEntree'], $_POST['indice'], $_POST['activite']);
			$info = $manager->creerMembreEquipePedagogique($membre, $_FILES['photo']);
			if ($info[0]) {
				$message = $_POST['nom'].' '.$_POST['prenom'].' a été ajouté dans l\' équipe pédagogique.';
			}else{
				$message = $info[1];
			}
			$membresEquipe = $manager->getMembresEquipePedagogique();
			include('vues/contenu/equipePedagogique/index.php');
			break;

		case 'supprimer':
			$manager->supprimerMembreEquipePedagogique($_GET['id']);
			$message = 'Le membre a été supprimé.';
			$membresEquipe = $manager->getMembresEquipePedagogique();
			include('vues/contenu/equipePedagogique/index.php');
			break;

		case 'modifier':
			$membre = $manager->getMembreEquipePedagogique($_GET['id']);
			include('vues/contenu/equipePedagogique/modification.php');
			break;

		case 'validerModification':
			$membre = new MembreBureau($_POST['nom'], $_POST['prenom'], $_POST['role'], $_POST['dateEntree'], $_POST['indice'], $_POST['activite']);
			$membre->setId($_POST['id']);
			$manager->modifierMembreEquipePedagogique($membre);
			$message = $_POST['nom'].' '.$_POST['prenom'].' a été modifié.';
			if ($_FILES['photo']['size'] > 0) {
				$info = $manager->modifierPhotoMembreEquipePedagogique($_POST['id'], $_FILES['photo']);
				if (!$info[0]) {
					$message = $info[1];
				}
			}
			$membresEquipe = $manager->getMembresEquipePedagogique();
			include('vues/contenu/equipePedagogique/index.php');
			break;

		default:
			$messageErreur = 'Désolé, une erreur est survenue.';
			include('vues/erreur.php');
			break;

	}

// }else{
// 	header('Location: ../index.php');
// 	exit();
// }

?>