<?php

	class ManagerChangerMdp
	{
		protected $connexion;

		function __construct()
		{
			$this->connexion = new ConnexionBDD();
		}
		//Génére un mot de passe aléatoire		
		public function VerifierCompte($mail, $mdp) {
			$reqChangerMdp = $this->connexion->getConnexion()->prepare('SELECT id FROM membres WHERE mail = :mail AND motDePasse = :password');
			$reqChangerMdp->execute(array(
			    'mail' => $mail,
			    'password' => $mdp));
			$resultat = $reqChangerMdp->fetch();

			if (!$resultat)
			{
			    $compteOK = false;
			}
			else
			{
			    $compteOK = true;
			}
			return $compteOK;
		}
		public function NewMdp($mail, $newMdp) {
			$reqNewMdp = $this->connexion->getConnexion()->prepare('UPDATE membres SET motDePasse = ? WHERE mail = ?');
			$reqNewMdp->execute(array($mail, $newMdp));
		}

	}

?>

 
		