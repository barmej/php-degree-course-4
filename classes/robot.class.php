<?php

class Robot{
    public $name;
    public $spec;
    public $image;
    public $questions;
    public $answers;

    function __construct($name, $spec, $image, $questions, $answers){
        $this->name=$name;
        $this->spec=$spec;
        $this->image=$image;
        $this->questions=$questions;
        $this->answers=$answers;
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