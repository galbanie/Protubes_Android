<?php
require_once './UserDAO.class.php';
require_once './User.class.php';
$userDAO = new UserDAO(); 
$user = $userDAO->connexion("yanis", "yanis");
$json= json_encode($user);
echo $json; 
?>
