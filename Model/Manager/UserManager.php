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
        $req->execute(array($mail, $password));
        if ($this->debug && $req->errorInfo()[0] != "0") {
            throw new Exception($req->errorInfo()[2]);
        }

        $user = $this->getByMail($mail);

        if (!empty($user)) {
            $userId = $user->getId();

            $req = $this->bdd->prepare("INSERT INTO userhasrole(idUser, idRole) VALUE($userId, 1)");
            $req->execute();
            if ($this->debug && $req->errorInfo()[0] != "0") {
                throw new Exception($req->errorInfo()[2]);
            }

            $req = $this->bdd->prepare("INSERT INTO userhasrole(idUser, idRole) VALUE($userId, 3)");
            $req->execute();
            if ($this->debug && $req->errorInfo()[0] != "0") {
                throw new Exception($req->errorInfo()[2]);
            }
        }
    }

    public function login($mail)
    {

        $user = $this->getByMail($mail);

        if (!empty($user)) {
            $req = $this->bdd->prepare("SELECT roles.* FROM userhasrole INNER JOIN roles ON userhasrole.idRole = roles.id WHERE idUser = ?");
            $req->execute(array($user->getId()));

            $req->setFetchMode(PDO::FETCH_OBJ);
            $user->setListRole($req->fetchAll());
        }

        return $user;
    }
}
