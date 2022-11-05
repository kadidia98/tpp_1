<?php
include('../config/db.php');
//code pour archiver en changeant la valeur 0 par 1
if (isset($_GET['modifid'])) {
    $id=$_GET['modifid'];
    
    $req=$conn->prepare("UPDATE user SET/*  etat='1'  */ prenom= :prenom, nom= :nom, mail= :email WHERE id='$id'");
    $req->execute();
    if($req){
        header("location:formModif.php?modif = modification reussi");
     }
     echo"hh";
}
?>