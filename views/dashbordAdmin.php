<?php
 session_start(); 

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
      <a href="connexion.php" class="col-md-8 d-flex justify-content-end text-decoration-none text-dark">
        <i class="fa-solid fa-arrow-right-from-bracket"></i>

      </a>
    </div>
  </nav>

  <div class="container w-50 p-3 col-md-5 mb-5  ">

    <h1 class="mb-5" style="text-align: center;">Tableau Admin</h1>
    <div class="col-md-8 " style="padding-top: 5px;">

      <?php

      if (isset($_GET['recherche'])) {

        $recherche = htmlspecialchars($_GET['recherche']);

        $utilisateur = "";
        $req = $conn->prepare('SELECT `id`, `matricule`, `nom`, `prenom`, `mail`, `roles`, `mot_de_passe`, `photo`, `date_ins`, `date_modif`, `date_archive`, `roles_etat`, `etat` FROM `user` WHERE `etat`=0 and `matricule` = "' . $recherche . '"');
        $req->execute(['matricule' => $recherche]);
        //  if ($req->fetch() == false) {
        $utilisateur = $req->fetch();
        // }
        //  var_dump($utilisateur);die;

        // if ($reponse->rowCount() > 0) {
        // $utilisateur = $reponse->fetchA();
        $existe = true;
      }

      ?>


      <form class="search d-flex justify-content-end " action="" method="GET">
        <input type="search" id="search_elv_input" name="recherche" placeholder="recherche..." required>
        <input type="submit" value="recherche" id="search_elv_button">

      </form>






      <button type="submit" class="col-md-3" id="submit" style="background-color: #ffff; color:#ffff"><a href="listeArchive.php" class="col-md-8 text-decoration-none text-dark">liste archiver</a></button>
    </div>
    <table class="table table-striped table table-bordered">

      <thead>
        <tr class="table-light">
          <th scope="col">Matricule</th>
          <th scope="col">Nom</th>
          <th scope="col">prenom</th>
          <th scope="col">email</th>
          <th scope="col">role</th>
          <th scope="col">action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $id = $_SESSION["identifiant"];
        $sql = $conn->prepare("SELECT * FROM user WHERE id != $id");
        $sql->execute();
        // var_dump($sql->fetch());die;


        if (isset($existe) && $existe) {
  ?>
    <a href="dashbordAdmin.php" style="text-decoration: none; color:black;display:flex; justify-content: center;">retour</a>
  <?php
            $etat = $utilisateur['etat'];
            $matricule = $utilisateur['matricule'];
            $nom = $utilisateur['nom'];
            $prenom = $utilisateur['prenom'];
            $email = $utilisateur['mail'];
            $role = $utilisateur['roles'];
            $id = $utilisateur['id'];
            // if ($etat == 0) {
              echo '<tr class="table-light">';
              echo  '<td>' . $matricule . '</td>';
  
              echo  '<td>' . $nom . '</td>';
              echo  '<td>' . $prenom . '</td>';
              echo  '<td>' . $email . '</td>';
              echo  '<td>' . $role . '</td>';
  
              echo  '<td> <a href="formModif.php?modifid=' . $id . '"> <i class="fa-solid fa-pen-to-square" style="color:black;"></i> </a> <a href="archive.php?supid=' . $id . '"><i class="fa-solid fa-file-zipper "style="color:red;"></i> </a> <a href="switch.php?switchid=' . $id . '"><i class="fa-solid fa-repeat " style="color:black;"></i></a></td>';
              echo '</tr>';
            
          
        }else{
          while ($donnee = $sql->fetch()) {
            $etat = $donnee['etat'];
            $matricule = $donnee['matricule'];
       
            $nom = $donnee['nom'];
            $prenom = $donnee['prenom'];
            $email = $donnee['mail'];
            $role = $donnee['roles'];
            $id = $donnee['id'];
            if ($etat == 0) {
              echo '<tr class="table-light">';
              echo  '<td>' . $matricule . '</td>';
  
              echo  '<td>' . $nom . '</td>';
              echo  '<td>' . $prenom . '</td>';
              echo  '<td>' . $email . '</td>';
              echo  '<td>' . $role . '</td>';
  
              echo  '<td> <a href="formModif.php?modifid=' . $id . '"> <i class="fa-solid fa-pen-to-square" style="color:black;"></i> </a> <a href="archive.php?supid=' . $id . '"><i class="fa-solid fa-file-zipper "style="color:red;"></i> </a> <a href="switch.php?switchid=' . $id . '"><i class="fa-solid fa-repeat " style="color:black;"></i></a></td>';
              echo '</tr>';
            }
          }
        }

    

        ?>
      </tbody>
    </table>



  </div>



</body>

</html>