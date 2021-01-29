<?php
/**
 * Objet qui récupére le chemin de l'url afin qu'il soit transmis à la route
 * Il récupere l'url, la méthode (ex : Get ou post) via des variables SUPERGLOBAL de type $_SERVER
 */

class HttpRequest{
    
    private $_url; // Url
    private $_method; // Méthode
    private $_param; // Param associé
    private $_route; // Permet d'enregistrer la route associé directement dans la proprièté de l'objet

    public function __construct($url = null, $method = null){
        $this->_url = (is_null($url))?$_SERVER['REQUEST_URI']:$url; // Recupération de l'url 
        $this->_method = (is_null($method))?$_SERVER['REQUEST_METHOD']:$method; // Récupération de la méthode Get Post Put Delete
        $this->_param = array();
    }

    public function getUrl() { return $this->_url; }
    public function getMethod() { return $this->_method; }
    public function getParam() { return $this->_param; }
    public function getRoute() { return $this->_route; }

    public function setRoute($route){ // On enregistre l'objet route dans la proprièté route de httpRequest
        $this->_route = $route; 
    }

    public function bindParam(){
        /**
         * Si dans la propriété route nous retrouvons l'url de httpRequest alors param array donnerais :
         * ex : route/5 route[0] = route/5 et route[1] = 5
         * l'index [0] correspond toujours à la regex complète
         * [1] contiendra le résultat demander à la regex
         */
        switch($this->_method){
            case 'GET':
            case 'DELETE':
                foreach($this->_route->getParam() as $param)
                {
                    if(isset($_GET[$param]))
                    {
                        $this->_param[] = $_GET[$param];
                    }
                }
            case 'POST':
            case 'PUT':
                foreach($this->_route->getParam() as $param)
                {
                    if(isset($_POST[$param]))
                    {
                        $this->_param[] = $_POST[$param];
                    }
                }
        }
    }

    public function run($config){

        $this->bindParam();
        $this->_route->run($this, $config);

    }

    public function addParam($value){

        $this->_param[] = $value;

    }
}