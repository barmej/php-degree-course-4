<?php

class Robot{
    public $id;
    public $name;
    public $spec;
    public $image;
    public $questions;
    public $answers;

    function __construct($id,$name, $spec, $image, $questions, $answers){
        $this->id=$id;
        $this->name=$name;
        $this->spec=$spec;
        $this->image=$image;
        $this->questions=$questions;
        $this->answers=$answers;
    }

    function addQuestion($question,$answer){
        if(!isset($this->questions)){
            $this->questions=array();
        }

        if (!isset($this->answers)) {
            $this->answers = array();
        }

        $this->questions[] = $question;
        $this->answers[] = $answer;

    }

    function __toString(){
        $result = "انا روبوت اسمي {$this->name} <br>";
        $result .= "مجالي هو {$this->spec} <br>";
        
        $questionsString="";
        foreach($this->questions as $value){
            $questionsString.=$value."<br>";
        }

        $result .= $questionsString;

        return $result;
    }
    
}

?>