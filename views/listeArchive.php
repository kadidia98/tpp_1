<?php
/* session_start(); */
require_once('../config/db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css">
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css ">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/brands.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/regular.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/solid.min.css">
</head>
<body style="background-color: #367995;">
<nav class="navbar navbar-expand-lg navbar-light bg-light mt-2">
  <div class="container-fluid">
    <img src="img/personne-physique-ou-morale-ce-quil-vous-faut-savoir-13012022020600081226.jpg" alt="" style=" clip-path: ellipse(50% 50%); width: 80px; height:40px;" srcset="">

    <a href="dashbordAdmin.php" class="col-md-8 d-flex justify-content-end text-decoration-none text-dark">
          Admin
        </a>
   
  </div>
</nav>

    <div class="container w-50 p-3 col-md-5 mb-5  ">
    
      <h1 class="mb-5" style="text-align: center;">Liste Archiver</h1>
    
       <table class="table table-striped table table-bordered">
 
  <thead>
    <tr class="table-light">
      <th  scope="col">Matricule</th>
      <th scope="col">Nom</th>
      <th scope="col">prenom</th>
      <th scope="col">email</th>
      <th scope="col">role</th>
      <th scope="col">action</th>
    </tr>
  </thead>
 
  <tbody>
  <?php
    $sql = $conn->prepare("SELECT * FROM user");
    $sql->execute();
    // var_dump($sql->fetch());die;




    while ($donnee = $sql->fetch())
   {$etat=$donnee['etat'];
   $matricule=$donnee['matricule'];
   $nom=$donnee['nom'];
   $prenom=$donnee['prenom'];
   $email=$donnee['mail'];
   $role=$donnee['roles'];
    $id=$donnee['id'];
      if($etat==1){ 
        echo '<tr class="table-light">';
        echo  '<td>'.$matricule.'</td>';

        echo  '<td>'.$nom.'</td>';
        echo  '<td>'.$prenom.'</td>';
        echo  '<td>'.$email.'</td>';
        echo  '<td>'.$role.'</td>';
 
        echo  '<td>  <a href="desarchive.php?decid='.$id.'"><i class="fa-regular fa-file-zipper ms-5" style="color: green;"></i></td>';
        echo '</tr>';}

         
    }

?>
  </tbody>
</table>

 

    </div>

    

</body>
</html>