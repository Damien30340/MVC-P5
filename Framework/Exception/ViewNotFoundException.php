<?php

class ViewNotFoundException extends Exception
{

    public function __construct($message = "No view has been Found")
    {

        parent::__construct($message, "0020");

    }


}
