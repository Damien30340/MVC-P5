<?php

/**
 * Class of application : HomeController extends BaseController.
 *
 * HomeController extends BaseController of Framework.
 * He puts in relation the manager and the view in associate with home page.
 *
 * @category Controller
 * @package  Framework
 * @author   Damien Gobert <contact@damiengobert.fr>
 */
class HomeController extends BaseController
{

    /**
     * The method show the view of home page.
     * 
     * @param  void
     * @return object, list object Folio => portfolio
     */
    public function home()
    {
        $captcha = new Recaptcha('6LcvbYgaAAAAAN86QRv2hvTSN2Q1fynlTLKBIPux', '6LcvbYgaAAAAABPH50fMR0RRsPplxUJyfPUjv9tp');
        $this->addParam("captcha", $captcha);
        $listFolio = $this->FolioManager->getAll();
        $this->addParam("listFolio", $listFolio);
        $this->view("home");
    }

    /**
     * The method initialize the porfolio and send the datas in view porfolio
     * 
     * @param  string, $id portofolio
     * @return object
     */
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
