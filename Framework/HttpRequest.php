<?php

/**
 * Class of Framework : httpRequest
 *
 * The class httpRequest that must contains the informations of the URL, methods, params and the route
 *
 * @category HttpRequest
 * @package  None
 * @author   Damien Gobert <contact@damiengobert.fr>
 */

class HttpRequest
{

    /** Property that contains url */
    private $url;
    /** Property that contains method used */
    private $method;
    /** Property that contains the params */
    private $param;
    /** Property that contains the route associated under an object */
    private $route;

    /**
     * The method construct that must recovery the url and method used.
     * 
     * Initialization propertys url, method, param. Param is an array.
     * @param string, $url = null
     * @param string, $method = null
     * @return void
     */
    public function __construct($url = null, $method = null)
    {
        $this->url = (is_null($url)) ? $_SERVER['REQUEST_URI'] : $url; // Recupération de l'url 
        $this->method = (is_null($method)) ? $_SERVER['REQUEST_METHOD'] : $method; // Récupération de la méthode Get Post Put Delete
        $this->param = array();
    }

    /**
     * The method getUrl that must show property url
     * 
     * @param void
     * @return string, $url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * The method getMethod that must show property method
     * 
     * @param void
     * @return string, $method
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * The method getParam that must show property param
     * 
     * @param void
     * @return string, $param
     */
    public function getParam()
    {
        return $this->param;
    }

    /**
     * The method getRoute that must show property route
     * 
     * @param void
     * @return Route, $route
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * The method saves an object route in property route of the class httpRequest
     * @param object, $route is an object !! 
     * @return void
     */
    public function setRoute($route)
    {
        $this->route = $route;
    }

    /**
     * 
     */
    public function bindParam()
    {
        $configFile = file_get_contents("Config/config.json"); // Récupération du fichier de config pour en faire une variable
        $config = json_decode($configFile); // Décodage du fichier .json
        $url = str_replace($config->basepath, "", $this->getUrl());

        switch ($this->method) {
            case 'GET':
            case 'DELETE':
                foreach ($this->route->getParam() as $param) {
                    if (isset($_GET[$param])) {
                        $this->param[] = $_GET[$param];
                    }
                }
                if (preg_match("#^" . $this->getRoute()->getPath() . "$#", $url, $params) > 0) {
                    unset($params[0]);
                    foreach ($params as $urlParam) {
                        $this->param[] = $urlParam;
                    }
                }
            case 'POST':
            case 'PUT':
                foreach ($this->route->getParam() as $param) {
                    if (isset($_POST[$param])) {
                        $this->param[] = $_POST[$param];
                    }
                }
        }
    }

    public function run($config)
    {
        $this->bindParam();
        $this->route->run($this, $config);
    }

    public function addParam($value)
    {
        $this->param[] = $value;
    }
}
