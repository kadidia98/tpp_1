<?php 
require_once('../config/db.php');


if (isset($_GET['modifid'])){
    $id=$_GET['modifid'];
    
    $req= $conn->prepare("SELECT * FROM user  WHERE id='$id'");
    $req->execute();
    if ($req-> rowCount()>0){
        $check = $req->fetchAll()[0];
    }

if(isset($_POST['nom'], $_POST['prenom'], $_POST['email'])){
     
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $id=$_GET['modifid'];
    
     $date_modif=date('y-m-d h:i:s'); 

    $edit=$conn->prepare("UPDATE user SET nom='$nom',prenom='$prenom', mail='$email', date_modif='$date_modif' WHERE id=$id");
    $edit->execute();
    if($edit){
        header('location: dashbordAdmin.php? message= modification réussi!!');
      
    }
    else { die('Erreur : '.$e->getMessage());
    }
}
     }

     ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css">
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js"></script>
</head>
<body style="background-color:  #367995;">
<nav class="navbar navbar-expand-lg navbar-light bg-light mt-2">
<div class="container-fluid">
    <img src="img/personne-physique-ou-morale-ce-quil-vous-faut-savoir-13012022020600081226.jpg" alt="" style=" clip-path: ellipse(50% 50%); width: 80px; height:40px;" srcset="">
   <!--  
    <a href="dashbordAdmin.php" class="col-md-8 d-flex justify-content-end text-decoration-none text-dark">
          Admin
        </a> -->
  </div>
</nav>

<div style="width: 1500px; padding-top:250px; margin-left:170px;"  class="d-flex justify-content-center ">
    <div class="contain  w-50 p-3 col-md-5 mb-8 base_color">
    <p class="text-center text-uppercase">Page Modification</p>

    <p><?=$_GET["message"]?? null?></p>


    <form class="row g-3  d-flex justify-content-center no-wrap m-2 bg-light" action="" method="POST">
    

     <div class="col-md-6">
      <label for="input1" class="form-label">Nom <span style="color: red;">*</span></label>
      <input type="text" name="nom" class="form-control  p-3 rounded-0" id="nom"  value="<?= $check["nom"] ?? null ?>" required>
      <div class="invalid-feedback d-none" id="champ-reqNom">champs requis</div>
     </div>
 
     <div class="col-md-6">
      <label for="input2" class="form-label">prenom<span style="color: red;">*</span></label>
      <input type="text" name="prenom" class="form-control p-3 rounded-0" id="prenom"  value="<?= $check["prenom"] ?? null ?>"required>
      <div class="invalid-feedback d-none" id="champ-reqPrenom">champs requis</div>
     </div>
  

     <div class="col-md-6" style="margin-right: 350px;">
      <label for="input3" class="form-label">Email<span style="color: red;">*</span></label>
      <input type="email" name="email" class="form-control p-3 mr-6 rounded-0 " id="email" value="<?= $check["mail"] ?? null ?>" required>
    
      <div class="valid-feedback">Email field is valid!</div>
     <div class="invalid-feedback d-none" id="champ-reqEmail">champs requis</div>
     <div class="invalid-feedback d-none" id="email-invalid">email incorrect</div>
     </div>


     


    

     

    <div class="col-md-8 " style="padding-top: 12px; margin-left: 450px;">
  <button type="submit" class="col-md-3 rounded-0" id="submit" style="background-color: #437089; color:#ffff"><a>  modifier</a>  </button>
  </div>
 
</form>
    </div>
</div>






















<script src="js/inscription.js"></script>
</body>
</html>