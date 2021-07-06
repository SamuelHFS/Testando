<?php

class Conecta{



    private $url = "localhost:3306";
    private  $user = "root";
    private  $password = "12345"; #mudarSenha12345
    private  $base = "produto01"; #mudarParaPRODUTO1

    

    public function conectadb(){
        return mysqli_connect($this->url, $this->user, 
                $this->password, $this->base);
    }
}