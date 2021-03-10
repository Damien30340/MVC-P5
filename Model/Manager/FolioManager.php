<?php

class FolioManager extends BaseManager
{
    public function __construct($datasource)
    {
        parent::__construct("portfolio", "Folio", $datasource);
    }

    public function getAll()
    {

        $req = $this->bdd->prepare("SELECT * FROM portfolio");
        $result = $req->execute();
        if ($result) {
            $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Folio");
            return $req->fetchAll();
        } else {
            throw new Exception($req->errorInfo()[2]);
        }
    }
}
