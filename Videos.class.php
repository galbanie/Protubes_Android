<?php
    class Video implements JsonSerializable{
        public $datePublication; 
        private $idImage; 
        private $chemin; 
        private $titre; 
        private $description; 
        private $categorie; 
       // private $idUser; 
        function __construct($datePublication="", $idImage="", $chemin="", $titre="", $description="", $categorie="", $idUser="") {
            $this->datePublication = $datePublication;
            $this->idImage = $idImage;
            $this->chemin = $chemin;
            $this->titre = $titre;
            $this->description = $description;
            $this->categorie = $categorie;
        //    $this->idUser = $idUser;
        }
        public function jsonSerialize() {
        return array('datePublication' => $this->datePublication,
            'idImage' => $this->idImage,
            'chemin' => $this->chemin,
            'idImage' => $this->idImage,
            'titre' => $this->titre,
            'description' => $this->description,
            'categorie' => $this->categorie);
         //   'idUser' => $this->idUser); 
      }
        public function getDatePublication() {
            return $this->datePublication;
        }

        public function setDatePublication($datePublication) {
            $this->datePublication = $datePublication;
        }

        public function getIdImage() {
            return $this->idImage;
        }

        public function setIdImage($idImage) {
            $this->idImage = $idImage;
        }

        public function getChemin() {
            return $this->chemin;
        }

        public function setChemin($chemin) {
            $this->chemin = $chemin;
        }

        public function getTitre() {
            return $this->titre;
        }

        public function setTitre($titre) {
            $this->titre = $titre;
        }

        public function getDescription() {
            return $this->description;
        }

        public function setDescription($description) {
            $this->description = $description;
        }

        public function getCategorie() {
            return $this->categorie;
        }

        public function setCategorie($categorie) {
            $this->categorie = $categorie;
        }
    }
?>
