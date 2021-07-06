<?php

#include_once 'C:/xampp/htdocs/PAcademia/PHP/bd/conectalivro.php'; #casa
#include_once 'C:/xampp/htdocs/PAcademia/PHP/model/livro.php';  #casa

include_once  'C:/xampp/htdocs/ProAcademia/PHP/bd/conectalivro.php';
include_once 'C:/xampp/htdocs/ProAcademia/PHP/model/livro.php';




class DaoLivro{

    public function inserir(Livro $livro){


        $conn = new Conecta();

        if($conn->conectadb()) {
        $titulo= $livro->getTitulo();

        $autor = $livro->getAutor();

        $editora = $livro->getEditora();

        $qtdEstoque = $livro->getQtdEstoque();

        $sql = "insert into livro values (null, '$titulo', '$autor', '$editora', '$qtdEstoque')";

            if (mysqli_query($conn->conectadb(), $sql)){
                $msg = "<p>Dados inseridos com sucesso</p>";
            } else {
                $msg = "<p>Erro no cadastramento com o BD</p>";
            }
      
        }else
            $msg = "Erro no cadastramento com o BD";
        mysqli_close($conn->conectadb());
        return $msg;
    }
}




