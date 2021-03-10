<?php

class Folio
{

    private $id;
    private $categorie;
    private $client;
    private $date_project;
    private $url_project;
    private $content;
    private $expertise;

    public function __construct()
    {
        $this->date_project = new DateTime($this->date_project);
    }

    public function getId()
    {
        return $this->id;
    }
    public function getCategorie()
    {
        return $this->categorie;
    }
    public function getClient()
    {
        return $this->client;
    }
    public function getUrlProject()
    {
        return $this->url_project;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function getDateProject()
    {
        return $this->date_project;
    }
    public function getFormatDate()
    {
        return $this->date_project->format('d/m/Y à H:i:s');
    }
    public function getExpertise()
    {
        return $this->expertise;
    }
}
