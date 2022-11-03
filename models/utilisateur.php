<?php
require_once "user.php";
//use Employe;
class utilisateur extends user {
    /**
     * Class constructor.
     */
    public function __construct($id, $nom, $prenom, $email, $role, $mot_de_passe, $photo)
    {
        parent::__construct($id, $nom, $prenom, $email, $role, $mot_de_passe, $photo);
    }
    
    public static function seConnecter(){
       header("location: ../views/pageUtilisateur.php");
    }
}