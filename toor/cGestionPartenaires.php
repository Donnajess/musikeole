<?php
	session_start();

if (isset($_SESSION['idAutorisation']) && $_SESSION['idAutorisation'] > 2) {

	function __autoload($class)
	{
		static $classDir = '../modeles/contenus';
		$file = str_replace('\\', DIRECTORY_SEPARATOR, ltrim($class, '\\')) . '.php';
		require "$classDir/$file";
	}

	// Chargement des classes
	include('../modeles/ConnexionBDD.php');
	include('../modeles/contenus/Partenaire.php');
	include('modeles/ManagerContenu.php');

	$manager = new ManagerContenu();

	if (isset($_GET['action'])) {
		$action = htmlentities($_GET['action']);
	}else{
		$action = 'index';
	}

	switch ($action) {

		case 'ajouterPartenaire':
			$info = $manager->enregistrerPartenaire($_POST['nomPartenaire'], $_FILES['logoPartenaire'], $_POST['lienPartenaire']);
			$message = 'Le partenaire "'.$_POST['nomPartenaire'].'" a été ajouté.';
			if (!$info[0]) {
				$message = $info[1];
			}
			$partenaires = $manager->getPartenaires();
			$publicites = $manager->getPublicites();
			include('vues/contenu/partenaires/index.php');
			break;

		case 'supprimerPartenaire':
			$manager->supprimerPartenaire($_GET['id']);
			$message = 'Le partenaire a été supprimé.';
			$partenaires = $manager->getPartenaires();
			$publicites = $manager->getPublicites();
			include('vues/contenu/partenaires/index.php');
			break;

		case 'nouvellePublicite':
			$publicite = $manager->getPublicite($_POST['idPublicite']);
			include('vues/contenu/partenaires/nouvellePublicite.php');
			break;

		case 'modifierPublicite':
			$publicite = $manager->getPublicite($_POST['idPublicite']);
			include('vues/contenu/partenaires/modificationPublicite.php');
			break;

		case 'validerRemplacement':
			$active = (isset($_POST['active'])) ? 1 : 0 ;
			$pub = new Publicite($_POST['id'], $_POST['nom'], $_POST['nomImage'], $_POST['lien'], $_POST['mail'], $_POST['indice'], $active);
			$info = $manager->remplacerPublicite($pub, $_FILES['image']);
			$message = 'La publicité "'.$_POST['nom'].'" a bien été modifiée';
			if (!$info[0]) {
				$message = $info[1];
			}
			$partenaires = $manager->getPartenaires();
			$publicites = $manager->getPublicites();
			include('vues/contenu/partenaires/index.php');			
			break;

		case 'index':
			$partenaires = $manager->getPartenaires();
			$publicites = $manager->getPublicites();
			include('vues/contenu/partenaires/index.php');
			break;

		default:
			$partenaires = $manager->getPartenaires();
			$publicites = $manager->getPublicites();
			include('vues/contenu/partenaires/index.php');
			break;

	}

}else{
	header('Location: ../index.php');
	exit();
}

?>