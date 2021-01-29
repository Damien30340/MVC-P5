<?php
/**
 * Class Bdd qui permet d'initialiser la connexion en bdd
 * Patern Singleton afin de limiter le nombre d'instanciation
 * GetInstance permet de créer une seule instance
 */
class BDD{

    private $_bdd;
    private static $_instance;


    public static function getInstance($datasource){

        if(empty(self::$_instance))
        {
            self::$_instance = new BDD($datasource);
        }        
        return self::$_instance->_bdd;
    }


    private function __construct($datasource){

        $this->_bdd = new PDO('mysql:dbname=' .$datasource->dbname. 
                             ';host=' .$datasource->host, 
                             $datasource->user, 
                             $datasource->password);

    }

}