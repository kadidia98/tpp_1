<?php
include('../config/db.php');
//code pour archiver en changeant la valeur 0 par 1
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