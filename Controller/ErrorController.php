<?php
/**
 * Class of application : ErrorController extends BaseController
 *
 * ErrorController extends BaseController of Framework
 *
 * @category Controller
 * @package  Framework
 * @author   Damien Gobert <contact@damiengobert.fr>
 */
class ErrorController extends BaseController
{

    /**
     * The method add param type of exception and send view
     * 
     * @param  string, $exception
     * @return void
     */
    public function show($exception)
    {

        $this->addParam("exception", $exception);
        $this->view("error");

    }

}
