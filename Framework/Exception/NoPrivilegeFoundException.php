<?php

class NoPrivilegeFoundException extends Exception
{

    public function __construct($message = "No Privilege has been found")
    {

        parent::__construct($message, "01500");

    }

}
