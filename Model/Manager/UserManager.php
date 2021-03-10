<?php


class UserManager extends BaseManager
{


    public function __construct($datasource)
    {
        parent::__construct("users", "User", $datasource);
    }

    public function getByMail($mail)
    {
        $req = $this->bdd->prepare("SELECT * FROM users WHERE mail = ?");
        $req->execute(array($mail));
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "User");
        return $req->fetch();
    }

    public function create($mail, $password)
    {
        $req = $this->bdd->prepare("INSERT INTO users(mail, password) VALUE(?, ?)");
        $return = $req->execute(array($mail, $password));
        if ($this->debug && $req->errorInfo()[0] != "0") {
            throw new Exception($req->errorInfo()[2]);
        }
        /*$id = $this->bdd->getLastId();
        $req = $this->bdd->prepare("INSERT INTO userhasrole(userId, roleId) VALUE(?, 1)");
        $return = $req->execute(array($id));*/
        return $return;
    }

    public function login($mail)
    {

        $req = $this->bdd->prepare("SELECT * FROM users WHERE mail = ?");
        $req->execute(array($mail));
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "User");

        $user = $req->fetch();

        if (!empty($user)) {
            $req = $this->bdd->prepare("SELECT idRole FROM userhasrole WHERE idUser = {$user->getId()}");
            $req->execute();

            $user->setListRole($req->fetch());
        }

        return $user;

    }

    public function privilege($role){

        $req = $this->bdd->prepare("SELECT code FROM roles WHERE id = ?");
        $req->execute(array($role[0]));
        
        return $req->fetch();

    }
}
