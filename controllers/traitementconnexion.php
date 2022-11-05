
<?php



 @$email = $_POST["email"];
 @$password =md5($_POST["password"]) ;
 @$submit = $_POST["submit"];
 @$message ="";
 if(isset($submit)) {
    include("../config/db.php");

  $res=$conn->prepare("SELECT mail FROM user WHERE mail= ?"); 
  

  $res->setFetchMode(PDO::FETCH_ASSOC);
  $res->execute(array($email));
  $tab=$res->fetchAll();
  if (count($tab)==0) {
    header("location:../views/index.php? message= Ce compte n'existe pas");

  }
  
 else {
  $ras=$conn->prepare("SELECT  mail AND mot_de_passe FROM user WHERE mail= ? and mot_de_passe = ?"); 
  $ras->setFetchMode(PDO::FETCH_ASSOC);
  $ras->execute(array($email,$password));
  $tub=$ras->fetchAll();
        if(count($tub)==0) {
          header("location:../views/index.php? message= mot de passe non exitant");

        }
        else {
          $affiche=$conn->prepare("SELECT  * FROM user WHERE mail= ? and mot_de_passe = ?"); 
        $affiche->setFetchMode(PDO::FETCH_ASSOC);
        $affiche->execute(array($email,$password));
        $row=$affiche->fetchAll();
          foreach ($row as $row) {

            if ($row['roles'] == 'admin') {
              session_start(); 
              $_SESSION["autoriser"]="oui";
              $_SESSION["identifiant"] = $row["id"];
              $_SESSION['photo']=$row['photo'];
             
            
         header("location:../views/dashbordAdmin.php");
            }
            else {
              session_start(); 
              $_SESSION["autoriser"]="oui";
              $_SESSION["identifiant"] = $row["id"];
              $_SESSION['photo']=$row['photo'];
         header("location:../views/utilisateur.php");
          }
  
          }

         
 }
}
}
 ?>

