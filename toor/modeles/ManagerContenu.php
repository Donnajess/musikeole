<?php

	/**
	* Classe manager de la gestion des contenus
	*/
	class ManagerContenu
	{
		
		protected $connexion;

		/**
		 * Constructeur
		 */
		function __construct()
		{
			$this->connexion = new ConnexionBDD();
		}

		public function enregistrerTexteMusikEole($pfichier, $ptexte)
		{
			$fichier = fopen('../data/contenu/musikeole/'.$pfichier, 'r+');
			ftruncate($fichier, 0);
			fseek($fichier, 0);
			fputs($fichier, $ptexte);
			fclose($fichier);
		}

		public function getTextesMusikEole()
		{
			$nomsFichiers = array('presentation', 'accueil', 'association');
			$textes = array();
			foreach ($nomsFichiers as $nomFichier) {
				$fichier = fopen('../data/contenu/musikeole/'.$nomFichier.'.txt', 'r');
				$contenu = '';
				while ($ligne = fgets($fichier)) {
					$contenu.=$ligne;
				}
				$textes[$nomFichier] = $contenu;
				fclose($fichier);
			}
			$reqAdresse = $this->connexion->getConnexion()->prepare('SELECT * FROM adresse');
			$reqAdresse->execute();
			$resAdresse = $reqAdresse->fetch();
			$textes['coordonnees'] = new Adresse($resAdresse['rue'], $resAdresse['codePostal'], $resAdresse['ville'], $resAdresse['telephone'], $resAdresse['mail']);
			return $textes;
		}

		public function modifierAdresseMusikEole($rue, $codePostal, $ville, $telephone, $mail)
		{
			$reqSuppression = $this->connexion->getConnexion()->prepare('DELETE FROM adresse');
			$reqSuppression->execute(array());
			$reqAdresse = $this->connexion->getConnexion()->prepare('INSERT INTO adresse VALUES (?, ?, ?, ?, ?)');
			$reqAdresse->execute(array($rue, $codePostal, $ville, $telephone, $mail));
		}

	}

?>