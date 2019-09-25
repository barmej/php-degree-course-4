<?php

class Db{
    public $conn;

    function __construct(){
        $servername = "localhost";
        $username = "root";
        $password = "barmej";
        $dbname = "robots";

        $this->conn = new mysqli($servername,$username,$password,$dbname);

        if($this->conn->connect_error){
            die('Connection failed: '.$this->connect_error);
        }
    }
}

?>