<?php
	session_start();

if (isset($_SESSION['idAutorisation']) && $_SESSION['idAutorisation'] > 2) {

	function __autoload($class)
	{
		static $classDir = '/modeles';
		$file = str_replace('\\', DIRECTORY_SEPARATOR, ltrim($class, '\\')) . '.php';
		require "$classDir/$file";
	}

	// Chargement des classes
	include('../modeles/ConnexionBDD.php');
	include('../modeles/contenus/Association.php');
	include('modeles/ManagerContenu.php');

	$manager = new ManagerContenu();

	if (isset($_GET['action'])) {
		$action = htmlentities($_GET['action']);
	}else{
		$action = 'index';
	}

	switch ($action) {

		case 'ajouterAssociation':
			$associations = $manager->getAssociations();
			include('vues/contenu/associations/formulaire.php');
			break;

		case 'valider':
			$fichier = $manager->formaterNomFichier($_POST['nom']).'.txt';
			$association = new Association(0, $_POST['nom'], $fichier, $_POST['indice'], '../data/contenu/associations/');
			$association->setContenu($_POST['texte']);
			$manager->enregistrerNouvelleAssociation($association);
			$message = 'L\'association "'.$_POST['nom'].'" a été créée.';
			$presentationEcole = $manager->getPresentationEcole();
			$associations = $manager->getAssociations();
			include('vues/contenu/associations/index.php');
			break;

		case 'modifierAssociation':
			$association = new Association($_POST['id'], $_POST['nom'], $_POST['fichier'], $_POST['indice'], '../data/contenu/associations/');
			$association->setContenu($_POST['texte']);
			$manager->modifierAssociation($association);
			$message = 'L\'association "'.$_POST['nom'].'" a été modifiée.';
			$presentationEcole = $manager->getPresentationEcole();
			$associations = $manager->getAssociations();
			include('vues/contenu/associations/index.php');
			break;

		case 'supprimerAssociation':
			$manager->supprimerAssociation($_GET['id']);
			$message = 'L\'association a été supprimée.';
			$presentationEcole = $manager->getPresentationEcole();
			$associations = $manager->getAssociations();
			include('vues/contenu/associations/index.php');
			break;

		case 'modifierEcole':
			$manager->modifierPresentationEcole($_POST['presentationEcole']);
			$message = 'La présentation de l\' école a été mise à jour.';
			$presentationEcole = $manager->getPresentationEcole();
			$associations = $manager->getAssociations();
			include('vues/contenu/associations/index.php');
			break;

		case 'index':
			$presentationEcole = $manager->getPresentationEcole();
			$associations = $manager->getAssociations();
			include('vues/contenu/associations/index.php');
			break;

		default:
			$presentationEcole = $manager->getPresentationEcole();
			$associations = $manager->getAssociations();
			include('vues/contenu/associations/index.php');
			break;

	}

}else{
	header('Location: ../index.php');
	exit();
}

?>