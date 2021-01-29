<?php
/**
 * Class générique CRUD
 * CREATE, READ, UPDATE, DELETE on Bdd
 */
class BaseManager{

    private $_table;
    private $_object;
    protected $_bdd;


    public function __construct($table, $object, $datasource){

        $this->_table = $table;
        $this->_object = $object;
        $this->_bdd = BDD::getInstance($datasource);

    }

/*
    public function create($obj, $param){

    }

    public function update($obj, $param)
    {

    }

*/
    public function delete($obj){

        if(property_exists($obj, "id"))
        {
            $req = $this->_bdd->prepare("DELETE FROM " .$this->_table. "WHERE id = ?");
            return $req->execute(array($obj->id));
        }
        else
        {
            throw new PropertyNotFoundException($this->_object, "id");
        }

    }

    public function getAll(){

        $req = $this->_bdd->prepare("SELECT * FROM " .$this->_table);
        $result = $req->execute();
        if($result){
            $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, $this->_object);
            return $req->fetchAll();
        } else {
            throw new Exception($req->errorInfo()[2]);
            
        }


    }

    public function getById($id){

        $req = $this->_bdd->prepare("SELECT * FROM " .$this->_table. " WHERE id = ?");
        $req->execute(array($id));
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, $this->_object);
        return $req->fetch();


    }


}