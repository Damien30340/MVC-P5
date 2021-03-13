<?php

class User
{

    private $id;
    private $mail;
    private $password;
    private $listRole;

    public function __construct($id = null, $mail = null, $listRole = null)
    {
        if($id != null){
            $this->id = $id;
            $this->mail = $mail;
            $this->listRole = $listRole;
        }
    }

    public function getListRole(){
        return $this->listRole;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getMail()
    {
        return $this->mail;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getAdmin(){
        return $this->admin;
    }
    public function getCode(){
        return $this->code;
    }
    public function setId($id)
    {
        $this->id = $id;
    }


    public function setListRole($role){
        $this->listRole = $role;
    }
    public function setMail($mail)
    {
        $this->mail = $mail;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function checkRole($auth){
        $result = array_filter($this->listRole, function($role) use($auth){
            return $role->code==$auth;
        });
        return count($result)==1;
    }
}
