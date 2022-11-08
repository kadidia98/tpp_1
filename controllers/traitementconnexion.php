
<?php



 @$email = $_POST["email"];
 @$password =md5($_POST["password"]) ;
 @$submit = $_POST["submit"];
 @$message ="";
 if(isset($submit)) {
    include("../config/db.php");

  $res=$conn->prepare("SELECT id,photo, roles, mail, mot_de_passe, etat FROM user WHERE mail= ? and mot_de_passe = ?" ); 
  

  $res->setFetchMode(PDO::FETCH_ASSOC);
  $res->execute(array($email, $password));
  $tab=$res->fetchAll();
  // var_dump($tab);
  
  if (count($tab)==0) {
    header("location:../views/index.php? message= Ce compte n'existe pas");
  }else{
      if (md5($_POST["password"]) == $tab[0]['mot_de_passe'] ) {
        session_start(); 
              $_SESSION["autoriser"]="oui";
              $_SESSION["identifiant"] = $tab[0]["id"];
              $_SESSION['photo']=$tab[0]['photo'];
    
          if ($tab[0]['roles'] == 'admin') {
            header("location:../views/dashbordAdmin.php");
          } else {
            header("location:../views/utilisateur.php");
          }
          
      }
  }
  
//  else {
//   $ras=$conn->prepare("SELECT  mail AND mot_de_passe FROM user WHERE mail= ? and mot_de_passe = ?"); 
//   $ras->setFetchMode(PDO::FETCH_ASSOC);
//   $ras->execute(array($email,$password));
//   $tub=$ras->fetchAll();
//         if(count($tub)==0) {
//           header("location:../views/index.php? message= mot de passe non exitant");

//         }
//         else {
//           $affiche=$conn->prepare("SELECT  * FROM user WHERE mail= ? and mot_de_passe = ?"); 
//         $affiche->setFetchMode(PDO::FETCH_ASSOC);
//         $affiche->execute(array($email,$password));
//         $row=$affiche->fetchAll();
//           foreach ($row as $row) {

//             if ($row['roles'] == 'admin') {
//               session_start(); 
//               $_SESSION["autoriser"]="oui";
//               $_SESSION["identifiant"] = $row["id"];
//               $_SESSION['photo']=$row['photo'];
             
            
//          header("location:../views/dashbordAdmin.php");
//             }
//             else {
//               session_start(); 
//               $_SESSION["autoriser"]="oui";
//               $_SESSION["identifiant"] = $row["id"];
//               $_SESSION['photo']=$row['photo'];
//          header("location:../views/utilisateur.php");
//           }
  
//           }

         
//  }
// }
}
 ?>

