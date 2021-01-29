<?php 

class PropertyNotFoundException extends Exception{

    private $_classname;
    private $_property;

    public function __construct($classname, $property, $message = "No property has been found"){

        $this->_classname = $classname;
        $this->_property = $property;
        parent::__construct($message, "0050");
    }

    public function getMoreDetail(){
        
        return "Property " .$this->_property. " does not exist in class " .$this->_class;

    }


}