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
	include('modeles/ManagerContenu.php');

	$manager = new ManagerContenu();

	if (isset($_GET['action'])) {
		$action = htmlentities($_GET['action']);
	}else{
		$action = 'index';
	}

	switch ($action) {

		case 'changerBanniere':
			$message = 'La bannière de la zone "'.$_POST['nom'].'" a été changée.';
			$info = $manager->changerBanniere($_POST['zone'], $_FILES['banniere']);
			if (!$info[0]) {
				$message = $info[1];
			}
			include('vues/contenu/bannieres/index.php');
			break;

		case 'index':
			include('vues/contenu/bannieres/index.php');
			break;

		default:
			include('vues/contenu/bannieres/index.php');
			break;

	}

}else{
	header('Location: ../index.php');
	exit();
}

?>