<?php
/**
 * Class qui permet de trouver et retourner la route correspondante à l'url fournis par HttpRequest
 * Elle à besoin de charger et lire le fichier "Config/route.json" et de lui instancié un objet avec la propriété listRoute
 * qui contiendra la liste de toutes les routes possible
 * Une fois récupéré, il va vérifié si une route a été trouvé via la méthode findRoute, il a besoin pour cela d'un objet route
 * et d'un objet HttpRequest
 * Il va RETOURNER un OBJET route à partir de la route trouvée, il retourne une ERREUR si aucune route trouvée.
 */
class Router{
    
    private $_listRoute;

    public function __construct(){
        $stringRoute = file_get_contents('Config/route.json');
        $this->_listRoute = json_decode($stringRoute);
    }
    public function findRoute($httpRequest, $basepath){
        $url = str_replace($basepath, "", $httpRequest->getUrl());
        $method = $httpRequest->getMethod();
        $routeFound = array_filter($this->_listRoute, function($route) use($url, $method){ // si il trouve une route dans le tableau il retourne true, sinon retourne false et n'est pas conservé
            return preg_match("#^" . $route->path . "$#", $url) && $route->method == $method; // retourne la variable path et method de la propièté équivalente de l'objet route
        });
        $numberRoute = count($routeFound);
        if($numberRoute > 1)
        {
            throw new MultipleRouteFoundException(); // Si il trouve plus de 1 route alors il retourne une exception
        } 
        elseif($numberRoute == 0)
        {
           throw new NoRouteFoundException($httpRequest); // Si il trouve 0 route alors il retourne une exception
        } 
        else 
        {
            return new Route(array_shift($routeFound)); // renvoi l'objet et non le tableau d'objets
        }
    }
}