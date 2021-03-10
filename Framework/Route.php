<?php

/** 
 * 
 * Class of Framework : Route
 *
 * The class route contains the datas of the class httpRequest for create an object.
 * This class must analyze the datas, checked if it is valid and associated with a route.
 * The routes are define in a file of configuration of folder config/route.json and instanciate in objects.
 * You must not be able to modify the routes directly in the class for the safety reasons
 *
 * @category Route
 * @package  None
 * @author   Damien Gobert <contact@damiengobert.fr>
 */

class Route
{

    /** Part of the url after domain name */
    private $path;
    /** name of the controller to be called */
    private $controller;
    /** name of the action to be called */
    private $action;
    /** name of the method to be called, example : GET, POST */
    private $method;
    /** name of the param to be called */
    private $param;
    /** name of the manager to be called */
    private $manager;
    /** name of the layour to be called */
    private $layout;
    private $auth;

    /**
     * The method construct initialize the propertys of this class
     * @param object, $route
     * @return void
     */
    public function __construct($route)
    {

        $this->path = $route->path;
        $this->controller = $route->controller;
        $this->action = $route->action;
        $this->method = $route->method;
        $this->param = $route->param;
        $this->manager = $route->manager;
        $this->layout = (!empty($route->layout) ? $route->layout : "layout");
        $this->auth = (!empty($route->auth) ? $route->auth : null);
    }

    /**
     * The method getPath that must show property path
     * 
     * @param void
     * @return string, $path
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * The method getController that must show property controller
     * 
     * @param void
     * @return string, $controller
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * The method getAction that must show property action
     * 
     * @param void
     * @return string, $action
     */
    public function getAction()
    {
        return $this->action;
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
     * The method getManager that must show property manager
     * 
     * @param void
     * @return string, $manager
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * The method getLayout that must show property layout
     * 
     * @param void
     * @return string, $layout
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * The method initialize the controller with name controller
     * 
     * If the class controllerName exist, instanciate this same class in object
     * Elseif, run exceptions
     * 
     * @param object, $httpRequest
     * @param object, $config
     * @return void
     */
    public function run($httpRequest, $config)
    {
        $controller = null;
        $controllerName = $this->controller . "Controller";
        if (class_exists($controllerName)) {
            $controller = new $controllerName($httpRequest, $config);
            if (method_exists($controller, $this->action)) {
                if ($this->auth != null) {
                    if (!empty($_SESSION['user'])) {
                        $auth = $controller->UserManager->privilege($_SESSION['user']->getListRole());
                        if (in_array($this->auth, $auth) && $this->auth == "ADM") {
                            $controller->countUser();
                            $controller->countComment();
                            $controller->countPost();
                            $controller->{$this->action}(...$httpRequest->getParam());
                        } elseif (in_array($this->auth, $auth) && $this->auth == "MBR") {
                            $controller->{$this->action}(...$httpRequest->getParam());
                        } else {
                            throw new NoPrivilegeFoundException();
                        }
                    } else {
                        throw new ConnexionNotFoundException();
                    }
                } else {
                    $controller->{$this->action}(...$httpRequest->getParam());
                }
            } else {
                throw new ActionNotFoundException();
            }
        } else {
            throw new ControllerNotFoundException();
        }
    }
}
