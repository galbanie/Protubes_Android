<?php
require_once './UserDAO.class.php';
require_once './User.class.php';
require_once './VideoDAO.class.php';
$userDAO = new UserDAO(); 
$user = $userDAO->connexion("yanis", "yanis");
$json= json_encode($user);
//echo $json; 
$videoDAO = new VideoDAO();
echo $videoDAO->getAllVideos();
?>
