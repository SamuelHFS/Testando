<?php

class Conecta{

<<<<<<< HEAD
    private  $url = "localhost:3306";
    private  $user = "root";
    private  $password = "senac";
    private  $base = "";
=======
    private $url = "localhost:3306";
    private  $user = "root";
    private  $password = "senac";
    private  $base = "produto1";
>>>>>>> be294fadcd332bf5b4247f6537fde1c4a15fb59f
    public $db;
    

    public function conectadb(){
        return mysqli_connect($this->url, $this->user, 
                $this->password, $this->base);
    }
}