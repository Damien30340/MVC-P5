<?php
/**
 * Class BDD
 *
 * BDD is a class that must create an instance of the same class to connect to the database
 * Patern singleton for limited the number of instanciation of the same class
 * The method allows to instanciate a single instance
 * @category BDD
 * @package  None
 * @author   Damien Gobert <contact@damiengobert.fr>
 */
class BDD{

    /** $bdd contains an object PDO  */
    private $bdd;
    /** $instance, static property for single instanciate */
    private static $instance;


    /**
     * The method that must create a single instance of this class
     * @param string, $datasource
     * @return object, instance of class BDD
     */
    public static function getInstance($datasource){

        if(empty(self::$instance))
        {
            self::$instance = new BDD($datasource);
        }        
        return self::$instance->bdd;
    }

    /**
     * The method initialize property $bdd
     * 
     * @param object, $datasource is an instance of the class PDO
     * @return void
     */
    private function __construct($datasource){

        $this->bdd = new PDO('mysql:dbname=' .$datasource->dbname. 
                             ';host=' .$datasource->host, 
                             $datasource->user, 
                             $datasource->password);

    }

}