<?php

class ActionNotFoundException extends Exception{

    public function __construct($message = "No Action has been found"){

        parent::__construct($message, "0100");

    }


}