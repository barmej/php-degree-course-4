<?php
include_once "./classes/robot.class.php";

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
                $results[] = new Robot($row["id"],$row["name"],$row["spec"],$row["image"],
                    json_decode($row["questions"]),json_decode($row["answers"]));
            }
            return $results;
        }

    }

    function login($email,$password){
        $stmt = $this->conn->prepare("SELECT username,email FROM users WHERE email=? AND password=?");
        $stmt->bind_param("ss",$email,$password);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows == 0){
            return false;
        }

        return $result->fetch_array(MYSQLI_ASSOC);
        
    }

    function updateRobot($robot){
        $stmt = $this->conn->prepare("UPDATE robots SET `name`=?,`spec`=?,`image`=?,`questions`=?, `answers`=? WHERE id=?");
        $encodedQuestions = json_encode($robot->questions);
        $encodedAnswers = json_encode($robot->answers);
        $stmt->bind_param("ssssss",$robot->name,$robot->spec,$robot->image,$encodedQuestions,$encodedAnswers,$robot->id);
        
        return $stmt->execute();
    }

    function createRobot($robot){
        $stmt = $this->conn->prepare("INSERT INTO robots 
            (`id`,`name`,`spec`,`image`,`questions`,`answers`) VALUES (NULL,?,?,?,?,?)");

        $encodedQuestions = json_encode($robot->questions);
        $encodedAnswers = json_encode($robot->answers);

        $stmt->bind_param("sssss", $robot->name, $robot->spec, $robot->image, $encodedQuestions, $encodedAnswers);
        
        return $stmt->execute();
        
    }
    
}

?>