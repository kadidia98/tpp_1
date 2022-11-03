 <?php include("../controllers/traitementinscription.php")?> 

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
<body style="background-color:  #367995;" class="d-flex justify-content-center">
<div style="width: 1500px; padding-top:200px;"  class="d-flex justify-content-center">
    <div class="contain  w-50 p-3 col-md-5 mb-8 base_color">
    <p class="text-center text-uppercase">Page inscription</p>

    <p><?=$_GET["message"]?? null?></p>


    <form class="row g-3 d-flex justify-content-center no-wrap m-2 bg-light" action="../controllers/traitementinscription.php" method="POST">
    

     <div class="col-md-6">
      <label for="input1" class="form-label">Nom <span style="color: red;">*</span></label>
      <input type="text" name="nom" class="form-control  p-3 rounded-0" id="nom" required>
      <div class="invalid-feedback d-none" id="champ-reqNom">champs requis</div>
     </div>
 
     <div class="col-md-6">
      <label for="input2" class="form-label">prenom<span style="color: red;">*</span></label>
      <input type="text" name="prenom" class="form-control p-3 rounded-0" id="prenom" required>
      <div class="invalid-feedback d-none" id="champ-reqPrenom">champs requis</div>
     </div>
  

     <div class="col-md-6">
      <label for="input3" class="form-label">Email<span style="color: red;">*</span></label>
      <input type="email" name="email" class="form-control  p-3 rounded-0 " id="email" required>
     <p><?=$_GET["message1"]?? null?></p>
      <div class="valid-feedback">Email field is valid!</div>
     <div class="invalid-feedback d-none" id="champ-reqEmail">champs requis</div>
     <div class="invalid-feedback d-none" id="email-invalid">email incorrect</div>
     </div>


     <div class="col-md-6">
     <label for="input4" class="form-label">Role<span style="color: red;">*</span></label>
     <select class="form-select  p-3 rounded-0" id="roles" name="roles" aria-label=".form-select-lg example" required>
     
 
        <option value=""></option>
        <option value="utilisateur">Utilisateur</option>
        <option value="admin">Admin</option>
    </select>
    <div class="invalid-feedback d-none" id="champ-reqRole">champs requis</div>
    </div>     


     <div class="col-md-6">
      <label for="input5" class="form-label">Mot de passe<span style="color: red;">*</span></label>
      <input type="password" name="password" class="form-control  p-3 rounded-0 " id="password_1" required>
      <div class="invalid-feedback d-none" id="champ-reqPass1">champs requis</div>
     
     </div>


     
     <div class="col-md-6">
      <label for="input6" class="form-label">Mot de passe<span style="color: red;">*</span></label>
      <input type="password" name="password1" class="form-control p-3 rounded-0" id="password_2" required>
      <div class="invalid-feedback d-none" id="champ-reqPass2">champs requis</div>
      <div class="invalid-feedback d-none" id="confirmation">les  mots de passe ne correspondent pas</div> 
     </div>

     <div class="col-md-6">
      <label for="avatar" class="form-label">Photo</label>
      <input type="file" name="photo" class="form-control p-3 rounded-0">
     </div>

    <div class="col-md-8 " style="padding-top: 12px; margin-left: 450px;">
  <button type="submit" class="col-md-3 rounded-0" id="submit" style="background-color: #437089; color:#ffff">S'inscrire</button>
  </div>
  <a href="connexion.php" class="col-md-8 d-flex justify-content-end text-decoration-none text-dark">
    Se connecter
</a>
</form>
    </div>
</div>






















<script src="js/inscription.js"></script>
</body>
</html>