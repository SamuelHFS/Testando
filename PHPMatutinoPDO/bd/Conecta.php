<?php

class Conecta {

    public function conectadb(){
        $pdo = null;
        try{
            $pdo = new PDO("mysql:host=localhost;dbname=dbphp01", 
                    "root", "12345");
        } catch (Exception $ex) {
            echo "<script>alert('Erro na conexão com o "
            . "banco de dados.')</script>";
        }   
        return $pdo;
    }
}
