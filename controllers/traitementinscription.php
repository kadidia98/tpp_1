<?php 
require_once '../config/db.php';


 



    if(isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['roles'], $_POST['password']/* , $_FILES['photo'] */)){
     
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $role = $_POST['roles'];
        $pass =md5($_POST['password']);
       /*  $photo = $_FILES['photo'] ; */
        $message = "";
        $message1 = "";
        if (!empty($_FILES['photo'])) {
          $photo = file_get_contents($_FILES['photo']['tmp_name']) ?? null;
/*           $typeFile = $_FILES['photo']['type'];
          $type = ['image/png', 'image/jpg', 'image/jpeg', ''];
          $nameFile = $_FILES['photo']['name'];
          $extensions = ['PNG', 'JPG', 'JPEG'];
          $extension = explode('.', $nameFile);

          $max_size = 1000000;
          if ($_FILES['photo']['size'] > $max_size) {
              header('Location: ../views/inscription.php?reg_err=photo');
              die();
          } */
/*           if (!in_array($typeFile, $type)) {
              header('Location: ../views/inscription.php?reg_err=type');
              die();
          }
          if (count($extension) >= 2 && in_array(strtolower(end($extension)), $extensions)) {
              header('Location: ../views/inscription.php?reg_err=erreur');
              die();
          } */
      }

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
            
            $sql =$conn -> prepare("INSERT INTO user (matricule, nom, prenom, mail, roles,mot_de_passe, photo) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $sql->BindParam(1, $mat);
            $sql->BindParam(2, $nom);
            $sql->BindParam(3, $prenom);
            $sql->BindParam(4, $email);
            $sql->BindParam(5, $role);
            $sql->BindParam(6, $pass);
            $sql->BindParam(7, $photo);

            //execution de la requete
           $sql->execute();



            











    
     
      
        header("location: ../views/inscription.php? message=Inscription Réussi" );  }
      
 }



 ?>




