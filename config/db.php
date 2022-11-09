<?php





// Se connecter à la base de données
/*  session_start();
 */ try{

    $conn = new PDO("mysql:host=localhost;dbname=tpp_1", "root", "didi");

}catch(PDOException $e){

    die('Erreur : '.$e->getMessage());

}
?>