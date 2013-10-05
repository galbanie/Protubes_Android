<?php
require_once './VideoDAO.class.php';
$videoDAO = new VideoDAO();
echo $videoDAO->getAllVideos();
?>
