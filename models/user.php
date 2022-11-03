<?php
abstract class user
{
    protected $id;
    protected $nom;
    protected $prenom;
    protected $email;
    protected $roles;
    protected $mot_de_passe;
    protected $photo;

    public function __construct($id, $nom, $prenom, $email, $roles, $mot_de_passe, $photo)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->roles= $roles;
        $this->mot_de_passe = $mot_de_passe;
        $this->photo = $photo;
    }
    /**
     * Get the value of id_emp
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

 /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->roles;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get the value of mdp
     */ 
    public function getMdp()
    {
        return $this->mot_de_passe;
    }

    /**
     * Set the value of mdp
     *
     * @return  self
     */ 
    public function setMdp($mot_de_passe)
    {
        $this->mot_de_passe = $mot_de_passe;

        return $this;
    }

   

    /**
     * Get the value of statut
     */ 
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of statut
     *
     * @return  self
     */ 
    public function setPhoto($photo)
    {
        $this->photo= $photo;

        return $this;
    }
}