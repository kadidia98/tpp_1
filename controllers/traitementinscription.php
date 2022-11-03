<?php 
 $conn = require_once('../config/db.php');


 



    if(isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['roles'], $_POST['password'], $_POST['photo'])){
     
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $role = $_POST['roles'];
        $pass =md5($_POST['password']);
        $photo = $_POST['photo'] ;
        $message = "";
        $message1 = "";


         echo "$nom,  $prenom";

         $sql = "SELECT mail FROM user WHERE mail='$email'";
         $res = $conn->query($sql); 
         if ($res->rowCount() > 0){  
           
            header("location: ../views/inscription.php? message1=addresse email déja pris");
            
          }
         

else{ 

        
            $sql =  "SELECT matricule from user";
              $mat;
              $res = $conn->query($sql);
              if ($res->rowCount() > 0) {
                  $matricules = $res->fetchAll();
                  $matricule = $matricules[count($matricules) - 1]['matricule'];
                  $increment = (int) explode("/", $matricule)[1] + 1;
                  $mat = "MEL_2022/$increment";
              }
            //insertion des donées dans la base
            
            $sql = "INSERT INTO user (matricule, nom, prenom, mail, roles,mot_de_passe, photo) VALUES ('$mat','$nom', '$prenom', '$email', '$role','$pass','$photo')";

            //execution de la requete
            $conn->exec($sql);



            











    
     
      
        header("location: ../views/inscription.php? message=Inscription Réussi" );  }
      
 }



 ?>




