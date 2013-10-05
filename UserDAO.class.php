<?php

require_once './User.class.php';
require_once './Database.class.php';
require_once './DAO.php';

class UserDAO extends DAO {

    private $db = null;

    function __construct() {
        $this->db = DataBase::getInstance();
    }

    public function add($objet) {
        
    }

    public function countRows() {
        
    }

    public function delete($colonne, $value) {
        
    }

    public function connexion($username, $password) {
        $request = "SELECT * FROM user WHERE identifiant=:x;";
        $pstmt = $this->db->prepare($request);
        $pstmt->execute(array(':x' => $username));
        $result = $pstmt->fetch(PDO::FETCH_OBJ);
        if ($result) {
            if ($result->password == $password) {
                $user = new User($result->id, $result->nom, $result->prenom, $result->idImage, $result->identifiant, $result->email, $result->password, $result->dateNaissance, $result->dateInscription, $result->pays, $result->codePostale, $result->telephone);
                $jsonObj = json_encode($user);
                return $user;
            }
        }
        return null;
    }

    public function get($colonne, $value) {
        return null;
    }

    public function getList($colonne, $value) {
        return null;
    }

    public function getListAll() {
        return null;
    }

    public function getListAllLimit($limitStart, $pagination) {
        return null;
    }

    public function getListLimit($colonne, $value, $limitStart, $pagination) {
        return null;
    }

}

?>