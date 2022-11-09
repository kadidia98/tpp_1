

<?php 
session_start();
require_once('../config/db.php');


    


if(isset($_GET['password0'], $_GET['password1'])){
     
    $password1=  $_GET['password1'];
    $password0 = $_GET['password'];

    

    if (isset($_GET['modifmdp'])){
        $id=$_GET['modifmdp'];
        
        $req= $conn->prepare("SELECT * FROM user  WHERE id='$id'");
        $req->execute();
        if ($req-> rowCount()>0){
            $check = $req->fetchAll()[0];
 
    if (md5($password)==$check['mot_de_passe']){

        $edit=$conn->prepare("UPDATE user SET mot_de_passe=$password1 WHERE id=$id");
        $edit->execute();

    }
}
    }else{
        echo"mot de passe different";
    }


}


@$email = $_POST["email"];
@$password =md5($_POST["password"]) ;
$id=  $_SESSION["identifiant"];
 $affiche=$conn->prepare("SELECT  * FROM user WHERE id = $id"); 
 $affiche->setFetchMode(PDO::FETCH_ASSOC);
 $affiche->execute(array($email,$password));
 $row=$affiche->fetchAll();


//  var_dump($row[0]['prenom']);die;
   foreach ($row as $row) {

   };
     

     ?> 











<!DOCTYPE html-5>
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
<div>
<?php  if(isset($_SESSION['photo'] ) && $_SESSION['photo']) {
           ?>
       
          <img src="data:image/jpg;base64,<?= base64_encode($_SESSION['photo'])?>" alt="" style=" clip-path: ellipse(50% 50%); width: 40px; height:40px;" srcset="">
<?php
        }else {
          echo '<img src="img/user.png">
          ';
        }?>      <p class="matricule"><?=$row['matricule']?></p>
      </div>
      <div style="display: flex; gap:1rem; margin-right: 1520px;">
    <p class="prenom"><?=$row['prenom']?></p>
    <p class="nom"><?=$row['nom']?></p>
    </div>
  </div>
</nav>

<div style="width: 1500px; padding-top:250px; margin-left:170px;"  class="d-flex justify-content-center ">
    <div class="contain  w-50 p-3 col-md-5 mb-8 base_color">
    <p class="text-center text-uppercase">Page Modification password</p>



    <form class="row g-3  d-flex justify-content-center no-wrap m-2 bg-light" action="" method="GET">
    

     <div class="col-md-6">
      <label for="input1" class="form-label">ancien password <span style="color: red;">*</span></label>
      <input type="password" name="password" class="form-control  p-3 rounded-0" id="password0"  required>
      <div class="invalid-feedback d-none" id="champ-reqNom">champs requis</div>
     </div>
 
     <div class="col-md-6">
      <label for="input2" class="form-label">nouveau password<span style="color: red;">*</span></label>
      <input type="password" name="password1" class="form-control p-3 rounded-0" id="password"  required>
      <div class="invalid-feedback d-none" id="champ-reqPrenom">champs requis</div>
     </div>
  
    
     <div class="col-md-8 " style="padding-top: 12px; margin-left: 450px;">
  <button type="submit" class="col-md-3 rounded-0" id="submit" style="background-color: #437089; color:#ffff"><a>  modifier</a>  </button>
  </div>
 
</form>
    </div>
</div>
</body>
</html>