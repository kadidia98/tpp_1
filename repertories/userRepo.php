<?php

class userRepo {
    private $conn;
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->conn = require_once("../config/db.php");
    }

    public function selectAll()
    {
        $users = [];
        $sql = "SELECT * FROM user WHERE etat=0";
        $reponse = $this->conn->query($sql);
        if ($reponse->rowCount() > 0) {
            $users = $reponse->fetchAll();
        }
        return $users;
    }

    public function selectAllArchive()
    {
        $users = [];
        $sql = "SELECT * FROM user WHERE etat=1";
        $reponse = $this->conn->query($sql);
        if ($reponse->rowCount() > 0) {
            $users = $reponse->fetchAll();
        }
        return $users;
    }
    
    public function recherche(string $recherche)
    {
    $users = [];
    $sql = "SELECT * FROM eleve where archive=0 and (nom like '%$recherche%' or prenom like  '%$recherche%'  or roles like '%$recherche%') ORDER BY id DESC" ;
       $reponse = $this->conn->query($sql);
       if ($reponse->rowCount() > 0) {
           $users = $reponse->fetchAll();
       }
       return $users;
   }

   public function archiver(int $idArchive)
   {
        $dateArchivage = date('y-m-d');
        $sql="UPDATE user SET etat=1, date_archivage='$dateArchivage' WHERE id=$idArchive";
        $this->conn->exec($sql);
   }
   public function desarchiver(int $idArchive)
   {
        
        $sql="UPDATE user SET etat=0, date_archivage=NULL WHERE id=$idArchive";
        $this->conn->exec($sql);
   }
   public function modifier($nom, $prenom, $email, $role, $mot_de_passe)
   {
   
$req =$this->conn->prepare('UPDATE eleve SET prenom = :prenom, nom = :nom , role = :role, tuteur= :tuteur  , numero_tuteur = :numero_tuteur WHERE id_eleve = :idEleve');

$req->execute(array(

       'nom' => $nom,
       'prenom' => $prenom,
       'email' => $email,
       'roles' => $role,
       
       )
    
    );

}
  

   public function selectOne($idElv){
    $eleve = null;
    $res = $this->conn->query("SELECT * FROM eleve WHERE id_eleve=$idElv");
    //$res = $req->execute(['id_eleve' => $id]);
    if ($res->rowCount() > 0) {
        $eleve = $res->fetchAll()[0];
    }
    return $eleve;
   }
   public function count(){
    $compteEleve ="SELECT COUNT(*) FROM eleve";
    $res = $this->conn->query($compteEleve);
    return $res->fetchColumn();
   }
}