<?php

class Post
{

    private $id;
    private $title;
    private $chapo;
    private $content;
    private $creation_date;


    public function __construct()
    {
        $this->creation_date = new DateTime($this->creation_date);
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
    public function getFormatDate()
    {
        return $this->creation_date->format('d/m/Y à H:i:s');
    }

}
