<?php

class UserController extends BaseController{

    public function login(){
        
        $this->view("login");

    }

    public function authenticate($mail, $password){

        $this->UserManager->create($mail, $password);
        $this->view("authenticate");   

    }


}