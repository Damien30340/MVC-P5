<?php

/**
 * Class of Framework : Controller
 *
 * BaseController it's a controller for management others controller
 * He puts in relation the manager and the view 
 * - example : PostController extends BaseController
 * This explains that when call PostController, this call the methods and propertys of BaseController
 * In example, the PostController call PostManager, initialize the variables and send in view
 * - $this->Manager->METHOD
 * - Initialize variables
 * - $this->view()
 *
 * @category Controller
 * @package  None
 * @author   Damien Gobert <contact@damiengobert.fr>
 */
class BaseController
{

    /***
     * 
     * $httpRequest must contains path of url 
     */
    protected $httpRequest;
    /***
     * 
     * $param must contains the params names 
     */
    protected $param;
    /***
     * 
     * $config must contains the config names 
     */
    protected $config;
    /***
     * 
     * $filemanager contains the FileManager name 
     */
    protected $fileManager;
    public $profil;

    /**
     * Method construct for initialization of controller
     * 
     * Initialization of propertys httprequest, config. Add array in the property param and add differents params
     * with method addParam.
     * Property FileManager create new Object FileManager 
     * 
     * @param $httpRequest
     * @param $config
     * 
     * @return object
     */
    public function __construct($httpRequest, $config)
    {

        $this->httpRequest = $httpRequest;
        $this->config = $config;
        $this->param = array();
        $this->addParam("httprequest", $this->httpRequest);
        $this->addParam("config", $this->config);
        $this->bindManager();
        $this->fileManager = new FileManager();
        if (empty($_SESSION['user'])) {
            $this->profil = new User('999', 'viewer@damiengobert.fr', [(object) array("id" => "999", "name" => "viewer", "code" => "VW")]);
            $this->addParam("profil", $this->profil);
        } else {
            $this->profil = $_SESSION['user'];
            $this->addParam("profil", $this->profil);
        }
    }

    /**
     * Recovers if files exists, view, css and js files correspondence.
     * 
     * Recovers the files names for view, css and js.
     * Buffering with function ob_start().
     * Extract params.
     * Inclusion view.
     * Recovers content in a variable $content with function ob_get_clean(), delete buffering.
     * Inclusion of layout correspondence with view.
     * 
     * @param  $filename
     * @return object
     */
    protected function view($filename)
    {

        if (file_exists("View/" . $this->httpRequest->getRoute()->getController() . "/css/" . $filename . ".css")) {
            $this->addCss("View/" . $this->httpRequest->getRoute()->getController() . "/css/" . $filename . ".css");
            $cssContent = $this->fileManager->generateCss();
            $this->addParam("cssContent", $cssContent);
        }
        if (file_exists("View/" . $this->httpRequest->getRoute()->getController() . "/js/" . $filename . ".js")) {
            $this->addJs("View/" . $this->httpRequest->getRoute()->getController() . "/js/" . $filename . ".js");
            $jsContent = $this->fileManager->generateJs();
            $this->addParam("jsContent", $jsContent);

        }
        if (file_exists("View/" . $this->httpRequest->getRoute()->getController() . '/' . $filename . ".php")) {
            ob_start();
            extract($this->param);
            include "View/" . $this->httpRequest->getRoute()->getController() . '/' . $filename . ".php";
            $content = ob_get_clean();
            include "View/" . $this->httpRequest->getRoute()->getLayout() . ".php";
        } else {
            throw new ViewNotFoundException();
        }
    }

    /**
     * Method this initialize and bind manager at controller
     * 
     * @param  void
     * @return object
     */
    public function bindManager()
    {

        foreach ($this->httpRequest->getRoute()->getManager() as $manager) {
            $managerName = $manager . "Manager";
            $this->$managerName = new $managerName($this->config);
        }
    }

    /**
     * Method for add differents param in controller for more range.
     * 
     * Method need name and value 
     *
     * @param  $name
     * @param  $value
     * @return object
     */
    public function addParam($name, $value)
    {

        $this->param[$name] = $value;
    }

    /**
     * Method this add css file for view
     * 
     * @param  $file
     * @return object
     */
    public function addCss($file)
    {

        $this->fileManager->addCssFile($file);
    }

    /**
     * Method this add js file for view
     * 
     * @param  $file
     * @return object
     */
    public function addJs($file)
    {

        $this->fileManager->addJsFile($file);
    }
}
