<?php
include_once 'C:/xampp/htdocs/PAcademia/PHP/dao/daoproduto.php';
include_once 'C:/xampp/htdocs/PAcademia/PHP/model/produto.php';
#include_once  'C:/xampp/htdocs/ProAcademia/PHP/dao/daoproduto.php';
#include_once 'C:/xampp/htdocs/ProAcademia/PHP/model/Produto.php';

class ProdutoController{
    public function inserirProduto($nome, $vlrCompra, $vlrVenda, $qtdEstoque){
        $produto = new Produto();
        $produto->setNome($nome);
        $produto->setvlrCompra($vlrCompra);
        $produto->setvlrVenda($vlrVenda);
        $produto->setEstoque($qtdEstoque);
         
        $daoProduto = new daoproduto();
        return $daoProduto->inserir($produto);
    }
}