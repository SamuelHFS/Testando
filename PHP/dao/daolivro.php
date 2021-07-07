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

    public function listarLivrosDAO(){
        $conn = new Conecta();
        if ($conn->conectadb()) {
            $sql = "select * from livro";
            $query = mysqli_query($conn->conectadb(), $sql);
            $result = mysqli_fetch_array($query);
            $lista = array();
            $a = 0;
            do{
                $livro = new Livro();
                $livro->setId($result['id']);
                $livro->setTitulo($result['titulo']);
                $livro->setAutor($result['autor']);
                $livro->setEditora($result['editora']);
                $livro->setQtdEstoque($result['qtdEstoque']);
                $lista[$a] = $livro;
                $a++;
            }while($result = mysqli_fetch_array($query));
            mysqli_close($conn->conectadb());
            return $lista;
        }
    }
}