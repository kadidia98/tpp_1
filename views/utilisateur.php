<?php
 session_start(); 

require_once('../config/db.php');
 if($_SESSION['autoriser']!='oui'){
header('location:index.php');
exit;


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
<header>

</header>

<body style="background-color: #367995;">
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
        }?>
              <p class="matricule"><?=$row['matricule']?></p>
      </div>
      <div style="display: flex; gap:1rem; margin-right: 200px;">
    <p class="prenom"><?=$row['prenom']?></p>
    <p class="nom"><?=$row['nom']?></p>

    </div>
      <a href="deconnexion.php" class="col-md-8 d-flex justify-content-end text-decoration-none text-dark" title="deconnexion">
        <i class="fa-solid fa-arrow-right-from-bracket"></i>
   </a>

    </div>
    
  </nav>
 

  <div class="container w-50 p-3 col-md-5 mb-5  ">

    <h1 class="mb-5" style="text-align: center;">Tableau utilisateur simple</h1>
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






    </div>
    <table class="table table-striped table table-bordered">

      <thead>
        <tr class="table-light">
          <th scope="col">Matricule</th>
          <th scope="col">Nom</th>
          <th scope="col">prenom</th>
          <th scope="col">email</th>
          <th scope="col">role</th>
          <th scope="col">Date inscription</th>
    
        </tr>
      </thead>
      <tbody>
        <?php
//la pagination debute ici




// On d??termine sur quelle page on se trouve
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}


// On d??termine le nombre total d'articles
$sql = "SELECT COUNT(*) AS nb_utilisateurs FROM user WHERE etat=0";

// On pr??pare la requ??te
$query = $conn->prepare($sql);

// On ex??cute
$query->execute();

// On r??cup??re le nombre d'articles
$result = $query->fetch();

$nbUtilisateurs = (int) $result['nb_utilisateurs'];

// On d??termine le nombre d'articles par page
$parPage = 13;

// On calcule le nombre de pages total
$pages = ceil($nbUtilisateurs / $parPage);

// Calcul du 1er article de la page
$premier = ($currentPage * $parPage) - $parPage;

$sql = $conn->prepare( "SELECT * FROM user WHERE etat=0 ORDER BY id != $id DESC LIMIT $premier, $parPage;");
$sql->execute();


       /* $id = $_SESSION["identifiant"];
        $sql = $conn->prepare("SELECT * FROM user WHERE id != $id");
        $sql->execute();  */
        // var_dump($sql->fetch());die;


        if (isset($existe) && $existe) {
  ?>
    <a href="utilisateur.php" style="text-decoration: none; color:black;display:flex; justify-content: center;">retour</a>
  <?php
            $etat = $utilisateur['etat'];
            $matricule = $utilisateur['matricule'];
            $nom = $utilisateur['nom'];
            $prenom = $utilisateur['prenom'];
            $email = $utilisateur['mail'];
            $role = $utilisateur['roles'];
            $dateins = $utilisateur['date_ins'];
            $id = $utilisateur['id'];
           
              echo '<tr class="table-light">
                <td>' . $matricule . '</td>
  
               <td>' . $nom . '</td>
               <td>' . $prenom . '</td>
               <td>' . $email . '</td>
              <td>' . $role . '</td>
              <td>' . $dateins . '</td>
  
              
      
              
              
              </td>
          
              </tr>';
            
          
        }else{
          while ($donnee = $sql->fetch()) {
            $etat = $donnee['etat'];
            $matricule = $donnee['matricule'];
       
            $nom = $donnee['nom'];
            $prenom = $donnee['prenom'];
            $email = $donnee['mail'];
            $role = $donnee['roles'];
            $dateins = $donnee['date_ins'];
            $id = $donnee['id'];
           
            if ($etat == 0) {
             
              echo '<tr class="table-light">';

             if($matricule != $row['matricule']){ echo  '<td>' . $matricule . '</td>';
  
              echo  '<td>' . $nom . '</td>';
              echo  '<td>' . $prenom . '</td>';
              echo  '<td>' . $email . '</td>';
              echo  '<td>' . $role . '</td>';
              echo  '<td>' . $dateins . '</td>';
              
               
                   }
               
               
               
              
      
                            
            
              
           echo '</tr>';
           
            }
              
          }
        }

    

        ?>
     

      </tbody>
    </table>

    
   <!--  suite PAGINATION -->

    <nav>
                    <ul class="pagination fixed-bottom justify-content-center">
                        <!-- Lien vers la page pr??c??dente (d??sactiv?? si on se trouve sur la 1??re page) -->
                        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                            <a href="?page=<?= $currentPage - 1 ?>" class="page-link">Pr??c??dente</a>
                        </li>
                        <?php for($page = 1; $page <= $pages; $page++): ?>
                          <!-- Lien vers chacune des pages (activ?? si on se trouve sur la page correspondante) -->
                          <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                                <a href="?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                            </li>
                        <?php endfor ?>
                          <!-- Lien vers la page suivante (d??sactiv?? si on se trouve sur la derni??re page) -->
                          <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                            <a href="?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                        </li>
                    </ul>
                </nav>
   
  </div>












</body>

</html>