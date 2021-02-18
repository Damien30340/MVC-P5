<?php 

class MethodNotFoundException extends Exception{

    private $classname;
    private $method;

    public function __construct($classname, $method, $message = "No method has been found"){

        $this->classname = $classname;
        $this->method = $method;
        parent::__construct($message, "0050");
    }

    public function getMoreDetail(){
        
        return "Method " .$this->method. " does not exist in class " .$this->classname;

    }


}