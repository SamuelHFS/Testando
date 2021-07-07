<?php
include_once 'C:/xampp/htdocs/PAcademia/PHP/dao/daolivro.php'; #casa
include_once 'C:/xampp/htdocs/PAcademia/PHP/model/livro.php'; #casa
#include_once  'C:/xampp/htdocs/ProAcademia/PHP/dao/daolivro.php';
#include_once 'C:/xampp/htdocs/ProAcademia/PHP/model/livro.php';


class LivroController{
    public function inserirLivro($titulo, $autor, $editora, $qtdEstoque){
        $livro = new Livro();
        $livro->setTitulo($titulo);
        $livro->setAutor($autor);
        $livro->setEditora($editora);
        $livro->setQtdEstoque($qtdEstoque);

        $daoLivro = new daolivro();
        return $daoLivro->inserir($livro);
    }

    public function listarLivros(){
        $daoLivro = new daolivro();
        return $daoLivro->listarLivrosDAO();
    

}

}

