<?php
require_once 'C:/xampp/htdocs/ProAcademia/PHP/bd/conecta.php';
require_once 'C:/xampp/htdocs/ProAcademia/PHP/model/Pessoa.php';




class daoPessoa {
    public $conn;
    
    function inserir(Pessoa $p) {
        $msg = "Dados cadastrados com sucesso!";
        $conn = new Conecta();

        if ($conn->conectadb()){
  
        $sql = "insert into pessoa values (null,'" . $p->getNome() .
                "','" . $p->getDtNasc() . "','" . $p->getLogin() . "','" .
                $p->getSenha() . "','" . $p->getPerfil() . "','" .
                $p->getEmail() . "','" . $p->getCpf() . "')";
        if (mysqli_query($conn->conectadb(), $sql) != 1){
            $msg = "Erro de Sintaxe";
        } 
        }else
            $msg = "Erro no cadastramento!";
        mysqli_close($conn->conectadb());
        return $msg;
    

}
}
