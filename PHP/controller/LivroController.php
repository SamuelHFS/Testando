<?php
include_once 'C:/xampp/htdocs/PAcademia/PHP/dao/daolivro.php';
include_once 'C:/xampp/htdocs/PAcademia/PHP/model/livro.php';
#include_once  'C:/xampp/htdocs/ProAcademia/PHP/dao/daoproduto.php';
#include_once 'C:/xampp/htdocs/ProAcademia/PHP/model/Produto.php';


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
}

