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
	include('modeles/ManagerAdherents.php');
	include('modeles/Adherent.php');

	$manager = new ManagerAdherents();

	if (isset($_GET['action'])) {
		$action = htmlentities($_GET['action']);
	}else{
		$action = 0;
	}

	switch ($action) {

		case 'demandes':
			$listeDemandes = $manager->getDemandesAdhesion();
			include("vues/gestionMembres/liste.php");
			break;
		
		case 'adherents':
			$listeAdherents = $manager->getAdherents();
			include("vues/gestionMembres/listeAd.php");
			break;

		case 'accepter':
			$idDemande = $_GET['id'];
			$manager->accepterDemande($idDemande);
			$message = "Cette demande a bien été acceptée, un nouvel adhérent a été ajouté.";
			$listeDemandes = $manager->getDemandesAdhesion();
			include("vues/gestionMembres/liste.php");
			break;
			break;

		case 'supprimerAdherent':
			$idAdherent = $_GET['id'];
			$manager->supprimerAdherent($idAdherent);
			$message_supp = "L'adhérent a bien été supprimé.";
			$listeAdherents = $manager->getAdherents();
			include("vues/gestionMembres/listeAd.php");
			break;

		case 'supprimerDemande':
			$idDemande = $_GET['id'];
			$manager->supprimerAdherent($idDemande);
			$message_supp = "La demande d'adhésion a été rejetée";
			$listeDemandes = $manager->getDemandesAdhesion();
			include("vues/gestionMembres/liste.php");
			break;

		default:
			$messageErreur = "Désolé, une erreur est survenue.";
			include("vues/erreur.php");
			break;

	}

// }else{
// 	header('Location: ../index.php');
// 	exit();
// }

?>