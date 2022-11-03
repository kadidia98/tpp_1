<?php 

$conn = require_once('../config/db.php');


if(isset($_POST['nom'], $_POST['prenom'], $_POST['email'])){
     
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    
    $message = "";
    $message1 = "";


     echo "$nom,  $prenom";

     $sql = "SELECT mail FROM user WHERE mail='$email'";
     $res = $conn->query($sql); 
     if ($res->rowCount() > 0){  
       
        header("location: ../views/formModif.php? message1=addresse email déja pris");
        
      }

else{  

//insertion des donées dans la base
            
$sql = "INSERT INTO user (nom, prenom, mail) VALUES ('$nom', '$prenom', '$email')";

//execution de la requete
$conn->exec($sql);


















header("location: ../views/formModif.php? message=Inscription Réussi" );  }

  }

?>