<?php
    require_once './Videos.class.php';
    require_once './Database.class.php';
    Class VideoDAO{
        private $db = null; 
        public function __construct() {
            $this->db = DataBase::getInstance();
        }
        
        public function getAllVideos(){
            $request = "SELECT * FROM videos"; 
            $result = $this->db->query($request);
            $obj = $result->fetchAll(); 
            $jsonObj = json_encode($obj); 
            return $jsonObj;
        }
    }
?>