<?php
   mysql_connect("localhost","root","");
   mysql_select_db("musikeole");
   

   if(isset($_POST['inscriptionAd'])) 
   {
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $dateNaissance = $_POST['datenaissance'];
      $mail = $_POST['mail'];
      $telephone = $_POST['telephone'];
      $adresse = $_POST['adresse'];
      $ville = $_POST['codepostal'];
      $codepostal = $_POST['ville'];
      $i = 0 ;

      //gestion des erreurs
      if(strlen($nom) < 2 || strlen($nom) > 20) 
      {
         $erreur_nom = "Votre nom doit comprendre entre 2 et 20 caractères";
         $i++;
      }  
      if(strlen($prenom) < 2 || strlen($prenom) > 20) 
      {
         $erreur_prenom = "Votre prénom doit comprendre entre 2 et 20 caractères";
         $i++;
      }
      //vérification de l'adresse mail
      if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $mail))
      {
         $erreur_mail3 = "Votre adresse mail n'a pas un format valide";
         $i++;
      }
      //vérification de l'adresse
      if(strlen($adresse) < 5 || strlen($adresse) > 50) 
      {
         $erreur_adresse= "Entrez une adresse correcte";
         $i++;
      }
      //vérification de la ville
      if(strlen($ville) < 3 || strlen($ville) > 50) 
      {
         $erreur_ville = "Enrez une ville correcte";
         $i++;
      }  
      if(!isset($_POST['checkbox'])) {
         $erreur_checkbox = "Veuillez confirmer la lecture du règlement";
         $i++;
      }

      //récupération de l'idFamille
      $nomFamille = $nom;
      $sql = "SELECT id FROM familles WHERE nom = '$nom' "; 
      $req = mysql_query($sql);
      if(mysql_numrows($req) > 0) 
      {
         $data = mysql_fetch_array($req);
         $idFamille = $data[0]; 
      }
      else 
      {
         $erreur_nom1 = "Entrez le même nom que celui que vous avez entré pour l'inscription membre";
         $i++;
      }
      //récupération de l'idMembre
      $sql1 = "SELECT id FROM membres WHERE nom = '$nom' AND prenom = '$prenom'";
      $req1 = mysql_query($sql1);
      if(mysql_numrows($req1) > 0) 
      {
         $data1 = mysql_fetch_array($req1);
         $idMembre = $data1[0]; 
      }
      else
      {
         $erreur_membre = "Membre inconnu";
         $i++;
      }
      

      //s'il n'y a aucune erreur on peut inscrire les données dans la table adhérent
      if($i == 0) 
      {
         $sql2 = "INSERT INTO adherents(dateNaissance,telephone,adresse,ville,codepostal,idFamille,idMembre,valide)
                  VALUES('$dateNaissance','$telephone','$adresse','$ville','$codepostal','$idFamille','$idMembre',0)";
         mysql_query($sql2);
         $inscriptionAd_correct = true;
         header('Location:../../index.php');
      }
   }

?>


