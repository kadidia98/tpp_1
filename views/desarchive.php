<?php
include('../config/db.php');
//code pour desarchiver en changeant la valeur 1par 0
if (isset($_GET['decid'])) {
    $id=$_GET['decid'];
    
    $req=$conn->prepare("UPDATE user SET etat='0' WHERE id='$id'");
    $req->execute();
    if($req){
        header('location:listeArchive.php');
     }
     echo"hh";
}
?>