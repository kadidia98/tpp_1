<?php
require_once "user.php";
//use Employe;
class Admin extends user {
    /**
     * Class constructor.
     */
    public function __construct($id, $nom, $prenom, $email, $roles, $mot_de_passe, $photo)
    {
        parent::__construct($id, $nom, $prenom, $email, $roles, $mot_de_passe, $photo);
    }
    
    public static function seConnecter(){
       header("location: ../views/dashbordAdmin.php");
    }
}