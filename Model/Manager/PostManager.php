<?php

class PostManager extends BaseManager
{

    public function __construct($datasource)
    {
        parent::__construct("posts", "Post", $datasource);
    }

    public function getAllPost()
    {

        $req = $this->bdd->prepare("SELECT * FROM posts");
        $result = $req->execute();
        if ($result) {
            $req->setFetchMode(PDO::FETCH_CLASS, "Post");
            return $req->fetchAll();
        } else {
            throw new Exception($req->errorInfo()[2]);
        }
    }

    public function getAllComment()
    {

        $req = $this->bdd->prepare("SELECT * FROM comments");
        $result = $req->execute();
        if ($result) {
            $req->setFetchMode(PDO::FETCH_CLASS, "Comment");
            return $req->fetchAll();
        } else {
            throw new Exception($req->errorInfo()[2]);
        }
    }

    public function create($title, $content)
    {
        $req = $this->bdd->prepare("INSERT INTO posts(title, content) VALUE(?, ?)");
        $req->execute(array($title, $content));
    }

}
