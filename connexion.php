<?php
    require_once './UserDAO.class.php';
    require_once './User.class.php';
    if(isset($_REQUEST["aUsername"]) && isset($_REQUEST["aPassword"])){
        $userDAO = new UserDAO(); 
        $user = $userDAO->connexion($_REQUEST["aUsername"],$_REQUEST["aPassword"]);
        $json= json_encode($user);
        echo $json; 
    }
?>
