<?php

	class ManagerMdpOublie
	{
		protected $connexion;

		function __construct()
		{
			$this->connexion = new ConnexionBDD();
		}
		//Génére un mot de passe aléatoire		
		public function random($car) {
			$string = "";
			$chaine = "abcdefghijklmnopqrstuvwxyz0123456789";
			srand((double)microtime()*1000000);
			for($i=0; $i<$car; $i++) {
				$string .= $chaine[rand()%strlen($chaine)];
			}
			return $string;
		}
		public function ChangerMdp($mail, $newMdp) {
			$reqNewMdp = $this->connexion->getConnexion()->prepare('UPDATE membres SET motDePasse = ? WHERE mail = ?');
			$reqNewMdp->execute(array($mail, $newMdp));
		}

	}

?>

 
		