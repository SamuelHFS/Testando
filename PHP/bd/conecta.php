<?php

class Conecta{

    private static $url = "localhost:3306";
    private static $user = "root";
    private static $password = "senac";
    private static $base = "";
    public $db;

    public function __construct()
    {
        $db= $this->conectadb();
    }
    

    function conectadb(){
        $link = mysqli_connect($this->getUrl(), $this->getUser(),
        $this->getPassword(), $this->getBase()) or die(mysqli_errno($link));
        return $link;
    }
    /**
     * Get the value of url
     */ 
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the value of base
     */ 
    public function getBase()
    {
        return $this->base;
    }
    }

    