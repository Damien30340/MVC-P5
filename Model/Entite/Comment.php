<?php

class Comment
{

    private $id;
    private $author;
    private $mail;
    private $description;
    private $creation_date;
    private $idPost;
    private $valid;

    public function __construct()
    {
        $this->creation_date = new DateTime($this->creation_date);
    }

    public function getId()
    {
        return $this->id;
    }
    public function getAuthor()
    {
        return $this->author;
    }
    public function getMail()
    {
        return $this->mail;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getIdPost()
    {
        return $this->idPost;
    }
    public function getCreation_date()
    {
        return $this->creation_date;
    }
    public function getFormatDate()
    {
        $text = "Ajouté le : ";
        $date = $this->creation_date->format('d/m/Y à H:i:s');
        $author = " par " . $this->getAuthor();
        return $text . $date . $author;
    }
    public function getValid()
    {
        return $this->valid;
    }
}
