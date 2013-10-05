<?php

class User implements \JsonSerializable {
    
    private $id; 
    private $nom;
    private $prenom;
    private $idImage;
    private $identifiant;
    private $email;
    private $password;
    private $dateNaissance;
    private $dateInscription;
    private $pays;
    private $codePostal;
    private $telephone;
    
    public function __construct($id = null, $nom = "d", $prenom = " d", $idImage = null, $identifiant = "d", $email = "d",$password = "d", $dateNaissance = "s", $dateInscription = "a", $pays = "q", $codePostal = "e", $telephone = "r") {
        $this->setId($id);
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setIdImage($idImage);
        $this->setIdentifiant($identifiant);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setDateNaissance($dateNaissance);
        $this->setDateInscription($dateInscription);
        $this->setPays($pays);
        $this->setCodePostal($codePostal);
        $this->setTelephone($telephone);
    }
    public function jsonSerialize() {
        return array('id' => $this->id,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'idImage' => $this->idImage,
            'identifiant' => $this->identifiant,
            'email' => $this->email,
            'password' => $this->password,
            'dateInscription' => $this->dateInscription); 
    }
    public function setId($id){
        $this->id = $id; 
    }
    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom,$notify = false) {
        $this->nom = $nom;
        if($notify) $this->notifyObservers ();
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom,$notify = false) {
        $this->prenom = $prenom;
        if($notify) $this->notifyObservers ();
    }

    public function getIdImage() {
        return $this->idImage;
    }

    public function setIdImage($imageProfile,$notify = false) {
        $this->idImage = $imageProfile;
        if($notify) $this->notifyObservers ();
    }
    
    public function getIdentifiant() {
        return $this->identifiant;
    }

    public function setIdentifiant($identifiant,$notify = false) {
        $this->identifiant = $identifiant;
        if($notify) $this->notifyObservers ();
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email,$notify = false) {
        $this->email = $email;
        if($notify) $this->notifyObservers ();
    }
    
    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password,$notify = false) {
        $this->password = $password;
        if($notify) $this->notifyObservers ();
    }

    public function getDateNaissance() {
        return $this->dateNaissance;
    }

    public function setDateNaissance($dateNaissance,$notify = false) {
        $this->dateNaissance = $dateNaissance;
        if($notify) $this->notifyObservers ();
    }

    public function getDateInscription() {
        return $this->dateInscription;
    }

    public function setDateInscription($dateInscription,$notify = false) {
        $this->dateInscription = $dateInscription;
        if($notify) $this->notifyObservers ();
    }

    public function getPays() {
        return $this->pays;
    }

    public function setPays($pays,$notify = false) {
        $this->pays = $pays;
        if($notify) $this->notifyObservers ();
    }

    public function getCodePostal() {
        return $this->codePostal;
    }

    public function setCodePostal($codePostal,$notify = false) {
        $this->codePostal = $codePostal;
        if($notify) $this->notifyObservers ();
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function setTelephone($telephone,$notify = false) {
        $this->telephone = $telephone;
        if($notify) $this->notifyObservers ();
    }
    public function __toString() {
        return $this->nom . $this->password . $this->identifiant;
    }

    
}

?> 