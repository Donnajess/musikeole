<?php

	class ManagerContact
	{
		
		protected $connexion;

		function __construct()
		{
			$this->connexion = new ConnexionBDD();
		}

		public function getMails()
		{
			$mails = array();
			$reqMails = $this->connexion->getConnexion()->prepare('SELECT * FROM membres WHERE idAutorisation = 2');
			$reqMails->execute();
			while ($ligne = $reqMails->fetch()) {
				array_push($mails, $ligne['mail']);
			}
			return $mails;
		}

	}

?>