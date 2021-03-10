<?php

/**
 * Class of application : HomeController extends BaseController.
 *
 * HomeController extends BaseController of Framework.
 * He puts in relation the manager and the view in associate with home page.
 * @category Controller
 * @package  Framework
 * @author   Damien Gobert <contact@damiengobert.fr>
 */
class HomeController extends BaseController
{

    /**
     * The method show the view of home page.
     * 
     * @param void
     * @return void
     */
    public function home()
    {
        $listFolio = $this->FolioManager->getAll();
        $this->addParam("listFolio", $listFolio);
        $this->view("home");
    }

    public function portfolio($id)
    {
        $search = "web";
        $replace = "Vitrine";
        $folio = $this->FolioManager->getById($id);
        $categorie = str_replace($search, $replace, $folio->getCategorie()); 
        $this->addParam('folio', $folio);
        $this->addParam('categorie', $categorie);
        $this->view("portfolio");
    }
}
