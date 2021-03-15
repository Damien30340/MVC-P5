<?php

class PostManager extends BaseManager
{

    public function __construct($datasource)
    {
        parent::__construct("posts", "Post", $datasource);
    }

    public function getAllPostMbr($currentPage)
    {
        $limit2 = $currentPage * 5;
        $limit1 = $limit2 - 5;
        $req = $this->bdd->prepare("SELECT * FROM posts LIMIT {$limit1}, {$limit2}");
        $result = $req->execute();
        if ($result) {
            $req->setFetchMode(PDO::FETCH_CLASS, "Post");
            return $req->fetchAll();
        } else {
            throw new Exception($req->errorInfo()[2]);
        }
    }
    public function getAllPostAdm()
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

    public function getAllPage()
    {

        // Récupération du nombre de posts dans la bdd
        $req = $this->bdd->prepare("SELECT COUNT(*) from posts");
        $req->execute();
        $result = $req->fetch();

        return $result;
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
