<?php

class Db{
    public $conn;

    function __construct(){
        $servername = "localhost";
        $username = "root";
        $password = "barmej";
        $dbname = "robots";

        $this->conn = new mysqli($servername,$username,$password,$dbname);
        $this->conn->set_charset("utf8");

        if($this->conn->connect_error){
            die('Connection failed: '.$this->connect_error);
        }
    }

    function allRobots(){
        //SELECT * FROM robots
        $stmt = $this->conn->prepare("SELECT * FROM robots"); // تجهيز الامر
        $stmt->execute(); //تنفيذ الامر
        $result = $stmt->get_result(); // استخراج النتائج
        
        if($result->num_rows == 0){
            return false;
        }else{
            $results=array();
            while( $row = $result->fetch_array(MYSQLI_ASSOC) ){
                $result[] = $row;
            }
            return $results;
        }

    }
    
}

?>