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
			$info = $manager->enregistrerPartenaire($_POST['nomPartenaire'], $_FILES['logoPartenaire']);
			$message = 'Le partenaire "'.$_POST['nomPartenaire'].'" a été ajouté.';
			if (!$info[0]) {
				$message = $info[1];
			}
			$partenaires = $manager->getPartenaires();
			include('vues/contenu/partenaires/index.php');
			break;

		case 'supprimerPartenaire':
			$manager->supprimerPartenaire($_GET['id']);
			$message = 'Le partenaire a été supprimé.';
			$partenaires = $manager->getPartenaires();
			include('vues/contenu/partenaires/index.php');
			break;

		case 'index':
			$partenaires = $manager->getPartenaires();
			include('vues/contenu/partenaires/index.php');
			break;

		default:
			$partenaires = $manager->getPartenaires();
			include('vues/contenu/partenaires/index.php');
			break;

	}

?>