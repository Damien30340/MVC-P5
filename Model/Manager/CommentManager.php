<?php

class CommentManager extends BaseManager
{

    public function __construct($datasource)
    {
        parent::__construct("comments", "Comment", $datasource);
    }

    public function create($idPost, $mail, $author, $description)
    {
        $req = $this->bdd->prepare("INSERT INTO comments(idPost, mail, author, description) VALUE(?, ?, ?, ?)");
        $result = $req->execute(array($idPost, $mail, $author, $description));
        if ($result) {
            $req->setFetchMode(PDO::FETCH_CLASS, "Comment");
            return $req->fetchAll();
        } else {
            throw new Exception($req->errorInfo()[2]);
        }
        // $req->execute(array($author, $mail, $description, $idPost));
    }

    public function update($id)
    {
        $req = $this->bdd->prepare("UPDATE comments SET valid = 1 WHERE id =:id");
        $req->execute(['id' => $id]);
    }

    public function getByValid()
    {
        $req = $this->bdd->prepare("SELECT * FROM comments WHERE valid is null");
        $result = $req->execute();
        if ($result) {
            $req->setFetchMode(PDO::FETCH_CLASS, "Comment");
            return $req->fetchAll();
        } else {
            throw new Exception($req->errorInfo()[2]);
        }
    }

    public function getAll()
    {

        $req = $this->bdd->prepare("SELECT * FROM comments ORDER BY creation_date DESC");
        $result = $req->execute();
        if ($result) {
            $req->setFetchMode(PDO::FETCH_CLASS, "Comment");
            return $req->fetchAll();
        } else {
            throw new Exception($req->errorInfo()[2]);
        }
    }

    public function getByIdPost($idPost)
    {
        $req = $this->bdd->prepare("SELECT * FROM comments WHERE idPost =:idPost AND valid = 1 ORDER BY creation_date DESC");
        $result = $req->execute(['idPost' => $idPost]);
        if ($result) {
            $req->setFetchMode(PDO::FETCH_CLASS, "Comment");
            return $req->fetchAll();
        } else {
            throw new Exception($req->errorInfo()[2]);
        }
    }
}
