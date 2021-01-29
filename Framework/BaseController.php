<?php
/**
 * Class qui sera la base de tout controller
 * Elle récupere l'objet httpRequest qui lui même aura la route correspondante
 * Le controller permettra d'appeler la vue et de mettre en lien le model
 * 
 */
class BaseController{

    private $_httpRequest;
    private $_param;
    private $_config;
    private $_fileManager;


    public function __construct($httpRequest, $config){

        $this->_httpRequest = $httpRequest;
        $this->_config = $config;
        $this->_param = array();
        $this->addParam("httprequest", $this->_httpRequest);
        $this->addParam("config", $this->_config);
        $this->bindManager();
        $this->_fileManager = new FileManager();

    }

    protected function view($filename){ 
/**
 * Demande le nom du fichier,
 * Ob Start = Mise en mémoire tampon de l'affichage
 * extraction des params de la propriété,
 * inclusion du fichier vue,
 * initialisation du content avec effacement de la mémoire tampon => récupération dans la variable $content
 * inclusion du layout
 */

        if(file_exists("View/" . $this->_httpRequest->getRoute()->getController() . "/css/" . $filename . ".css"))
        {
            $this->addCss("View/" . $this->_httpRequest->getRoute()->getController() . "/css/" . $filename . ".css");
        }
        if(file_exists("View/" . $this->_httpRequest->getRoute()->getController() . "/js/" . $filename . ".js"))
        {
            $this->addJs("View/" . $this->_httpRequest->getRoute()->getController() . "/js/" . $filename . ".js");
        }
        if(file_exists("View/" . $this->_httpRequest->getRoute()->getController() . '/' . $filename. ".php"))
        {
            ob_start();
            extract($this->_param);
            include("View/" . $this->_httpRequest->getRoute()->getController() . '/' .$filename. ".php");
            $content = ob_get_clean();
            include("View/layout.php");
        }
        else
        {
            throw new ViewNotFoundException();
        }

    }

    public function bindManager(){

        foreach($this->_httpRequest->getRoute()->getManager() as $manager)
        {
            $managerName = $manager . "Manager";
            $this->$managerName = new $managerName($this->_config->database);
        }

    }

    public function addParam($name, $value){
/**
 * Permettra d'ajouter un parametre à la liste des params
 * avec un nom et une valeur
 */
        $this->_param[$name] = $value;

    }

    public function addCss($file){

        $this->_fileManager->addCss($file);
    
    }

    public function addJs($file){

        $this->_fileManager->addJs($file);

    }


}