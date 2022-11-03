<?php
require_once('../config/db.php');

if (isset($_GET['switchid'])) {
    $id = $_GET['switchid'];

    $req = $conn->prepare("SELECT * FROM user WHERE id = $id");
    $req->execute();

    if ($req->rowCount()>0) {
        $data = $req->fetchAll()[0];
        if ($data['roles'] === 'admin') {
            $req = $conn-> prepare("UPDATE user SET roles_etat = 1, roles = 'utilisateur' WHERE id = $id");
            $req->execute();
        }else{
            $req = $conn-> prepare("UPDATE user SET roles_etat = 0, roles = 'admin' WHERE id = $id");
            $req->execute();
        }
    }
    if ($req) {
        header("Location:dashbordAdmin.php"); 
    }
}
?>