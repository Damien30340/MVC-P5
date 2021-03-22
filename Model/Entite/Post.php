<?php

class Post
{

    private $id;
    private $title;
    private $chapo;
    private $content;
    private $creation_date;
    private $dateUpdate;


    public function __construct()
    {
        $this->creation_date = new DateTime($this->creation_date);
        ($this->dateUpdate === null)? null: $this->dateUpdate = new DateTime($this->dateUpdate);
    }

    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getChapo(){
        return $this->chapo;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function getCreation_date()
    {
        return $this->creation_date;
    }
    public function getDateUpdate(){
        return $this->dateUpdate;
    }
    public function getFormatDate()
    {
        $text = 'Ajouté le : ';
        $author = ' par Damien';
        $date = $this->creation_date->format('d/m/Y à H:i');
        return $text . $date . $author;
    }
    public function getFormatDateUpdate()
    {
        $text = 'Dernière modification le : ';
        $date = $this->dateUpdate->format('d/m/Y à H:i');
        return $text . $date;
    }

}
