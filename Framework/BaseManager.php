<?php

/**
 * Class of Framework : BaseManager, CRUD Manager
 *
 * BaseManager it's a manager for management others manager
 * - example : PostManager extends BaseManager
 * This explains that when call PostManager, this call the methods and propertys of BaseManager
 * Create, Read, Update, Delete.
 *
 * @category Manager
 * @package  None
 * @author   Damien Gobert <contact@damiengobert.fr>
 */
class BaseManager
{


    /***
     * 
     * $table contains the table name 
     */
    protected $table;
    /***
     * 
     * $object contains the objet name 
     */
    protected $object;
    /***
     * 
     * $bdd contains the bdd name 
     */
    protected $bdd;
    protected $debug;


    /**
     * Method for construct an object with property : table name, object name, datasource name who is an instance of the class BDD
     * 
     * @param  string, $table
     * @param  object, $object
     * @param  string, $bdd
     * @return void
     */
    public function __construct($table, $object, $config)
    {

        $this->table = $table;
        $this->object = $object;
        $this->bdd = BDD::getInstance($config->database);
        $this->debug = $config->environement == "dev";
    }

    public function count()
    {
        $req = $this->bdd->query("SELECT COUNT(*) FROM " . $this->table);
        $return = $req->fetchColumn();
        if ($this->debug && $req->errorInfo()[0] != "0") {
            throw new Exception($req->errorInfo()[2]);
        }
        return $return;
    }
    /*
    public function create($obj, $param){

    }

    public function update($obj, $param)
    {

    }

    */

    /**
     * Method request delete sql
     * 
     * The request need the object name and the object id.
     * The method check if the method of this object exist
     * If yes, then she's delete entry in the bdd,
     * if no correspondence then return an Exception
     * 
     * @param  obj
     * @method string getId()
     * @return string
     */
    public function delete($obj)
    {

        if (method_exists($obj, "getId")) {
            $req = $this->bdd->prepare("DELETE FROM " . $this->table . " WHERE id = ?");
            $return = $req->execute(array($obj->getId()));
            if ($this->debug && $req->errorInfo()[0] != "0") {
                throw new Exception($req->errorInfo()[2]);
            }
            return $return;
        } else {
            throw new MethodNotFoundException($this->object, "getId");
        }
    }

    /**
     * Method request select sql
     * 
     * The request select all datas in the bdd
     * 
     * @param  void
     * @return string
     */
    public function getAll()
    {

        $req = $this->bdd->prepare("SELECT * FROM " . $this->table);
        $result = $req->execute();
        if ($result) {
            $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->object);
            return $req->fetchAll();
        } else {
            throw new Exception($req->errorInfo()[2]);
        }
    }

    /**
     * Method request select sql
     * 
     * The request select all datas in the bdd with a condition.
     * The method need a one param, the id of the object.
     * If object id exist and it's correspondence with datas in the bdd,
     * then return datas
     *
     * @param  id
     * @return string
     */
    public function getById($id)
    {

        $req = $this->bdd->prepare("SELECT * FROM " . $this->table . " WHERE id = ?");
        $req->execute(array($id));
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->object);
        return $req->fetch();
    }
}
