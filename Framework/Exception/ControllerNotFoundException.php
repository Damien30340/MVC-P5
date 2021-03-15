<?php

class ControllerNotFoundException extends Exception
{

    public function __construct($message = "No Controller has been found")
    {

        parent::__construct($message, "0200");

    }


}
