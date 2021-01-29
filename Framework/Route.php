<?php 
/** 
 * Class route qui récuperera les données de la class HttpRequest afin de d'en créer un objet
 * La class route permet de vérifier si les données récuperés sont valables et associés à une route
 * Les routes sont définies dans un fichier de configuration du dossier config/route.json et instanciés en objets
 * On ne doit pas pouvoir modifier les routes directement dans la class route par soucis de sécurité
*/

class Route{

    private $_path; // Partie de l'url après le nom de domaine
    private $_controller; // Type de controller à appeller
    private $_action; // L'action du controller qui sera appellé
    private $_method; // La méthode utilisée, pas exemple : Get, POST
    private $_param; // Les paramètres envoyés (sous forme de variable par exemple)
    private $_manager; // Reçois le manager

    public function __construct($route){
        $this->_path = $route->path;
        $this->_controller = $route->controller;
        $this->_action = $route->action;
        $this->_method = $route->method;
        $this->_param = $route->param;
        $this->_manager = $route->manager;
    }

    public function getPath(){ return $this->_path; }
    public function getController(){ return $this->_controller; }
    public function getAction(){ return $this->_action; }
    public function getMethod(){ return $this->_method; }
    public function getParam(){ return $this->_param; }
    public function getManager(){ return $this->_manager; }

    public function run($httpRequest, $config){

        $controller = null;
        $controllerName = $this->_controller . "Controller";
        if(class_exists($controllerName))
        {
            $controller = new $controllerName($httpRequest,$config);
            if(method_exists($controller, $this->_action))
            {
                $controller->{$this->_action}(...$httpRequest->getParam());
            }
            else
            {
                throw new ActionNotFoundException();
            }
        }
        else
        {
            throw new ControllerNotFoundException();
        }
    }
}