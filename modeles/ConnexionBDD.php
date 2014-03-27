<?php
	class ConnexionBDD{
	
		protected $connexion;
		
		function __construct(){
			$dsn = "mysql:host=localhost;dbname=musikeole";
			$user = "root";
			$pass = "";
			try {
				$this->connexion = new PDO($dsn, $user, $pass);
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}

		/**
		 * retourne la connexion à la base de données
		 * @return PDO la connexion
		 */
		function getConnexion(){
			return $this->connexion;
		}
	}
?>