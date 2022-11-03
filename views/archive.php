<?php
include('../config/db.php');
//code pour archiver en changeant la valeur 0 par 1
if (isset($_GET['supid'])) {
    $id=$_GET['supid'];
    
    $dateArchivage = date('y-m-d');
    $req=$conn->prepare("UPDATE user SET etat='1',date_archive='$dateArchivage' WHERE id='$id'");
    $req->execute();
    if($req){
        header('location:dashbordAdmin.php');
     }
     echo"hh";
}
?>