<?php

class ConnexionNotFoundException extends Exception{

    public function __construct($message = "No connexion has been found"){

        parent::__construct($message, "0100");

    }


}