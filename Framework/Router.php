<?php


/** 
 * Class of Framework : Router
 *
 * The class must find and return the route associate of the url send of httpRequest.
 * She's need of load and read the file Config/route.json and instanciate an object with the property listRoute that contains
 * the list of all routes possible.
 * The class checked a route if it is valid and find with method findRoute. The class need an object route and an object httpRequest.
 * She's return an object route or an error. 
 *
 * @category Router
 * @package  None
 * @author   Damien Gobert <contact@damiengobert.fr>
 */
class Router
{
    
    /**
     * 
     * Contains the list of the routes 
     */
    private $listRoute;

    /**
     * The method read the file .json in Config/route.json
     * 
     * Initialization of the property listRoute with datas of the route.json
     *
     * @param  void
     * @return void
     */
    public function __construct()
    {
        $stringRoute = file_get_contents('Config/route.json');
        $this->listRoute = json_decode($stringRoute);
    }

    /** 
     * The method search route associate.
     * 
     * If no route find, else return exceptions
     * 
     * @param  object, $httpRequest
     * @param  object, $basepath
     * @return object
     */
    public function findRoute($httpRequest, $basepath)
    {
        $url = str_replace($basepath, "", $httpRequest->getUrl());
        /*if(preg_match("#([\/][A-Za-z]+)([\?])([a-z]+[\=])([0-9])#",$url))
        {

            $pattern = '#([\/][A-Za-z]+)([\?])([a-z]+[\=])([0-9])#';
            $regex = preg_match($pattern, $url, $matches);

            $url = $matches[1];
        }*/

        $method = $httpRequest->getMethod();
        $routeFound = array_filter(
            $this->listRoute, function ($route) use ($url, $method) {
                return preg_match("#^" . $route->path . "$#", $url) && $route->method == $method;
            }
        );
        $numberRoute = count($routeFound);
        if($numberRoute > 1) {
            throw new MultipleRouteFoundException(); 
        } 
        elseif($numberRoute == 0) {
            throw new NoRouteFoundException($httpRequest); 
        } 
        else 
        {
            return new Route(array_shift($routeFound)); 
        }
    }
}
