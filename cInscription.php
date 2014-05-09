<?php
	// Chargement des classes
	include('modeles/ConnexionBDD.php');
	include('includes/packageGestionMembres.php');
	include('modeles/ManagerInscription.php');

	$manager = new ManagerInscription();

	if (isset($_GET['action'])) {
		$action = htmlentities($_GET['action']);
	}else{
		$action = 0;
	}

	switch ($action) {
		case 'individuel':
			include("vues/gestionMembres/individuel.php");
			break;
		
		case 'famille':
			$nbPersonnes = $_POST['nbPersonnes'];
			include("vues/gestionMembres/famille.php");
			break;

		case 'validerFamille':
			$nbPersonnes = $_POST['nbPersonnes'];
			$inscrits = array();
			for ($i=0; $i < $nbPersonnes; $i++) { 
				$num = $i + 1;
				$nom = $_POST['nom'.$num];
				$prenom = $_POST['prenom'.$num];
				$dateNaissance = $_POST['dateNaissance'.$num];
				$telephone = $_POST['telephone'.$num];
				$mail = $_POST['mail'.$num];
				$password = $_POST['password'.$num];
				array_push($inscrits, new Champs($nom, $prenom, $dateNaissance, $telephone, $mail, $password));
			}
			$manager->creerAdherents($inscrits);
			$message = 'Vos demandes d\'inscriptions ont été prises en compte, elles seront acceptées quand vous aurez réglé votre cotisation.';
			include("vues/gestionMembres/famille.php");
			break;

		case 'validerIndividuel':
			$inscrit = array();
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$dateNaissance = $_POST['dateNaissance'];
			$telephone = $_POST['telephone'];
			$mail = $_POST['mail'];
			$password = $_POST['password'];
			array_push($inscrit, new Champs($nom, $prenom, $dateNaissance, $telephone, $mail, $password));
			$manager->creerAdherents($inscrit);
			$message = 'Votre demande d\'adhésion a été prise en compte, elle sera acceptée quand vous aurez réglé votre cotisation.';
			include("vues/gestionMembres/individuel.php");
			break;

		default:
			$messageErreur = "Désolé, une erreur est survenue.";
			include("inscription.php");
			break;
	}

?>