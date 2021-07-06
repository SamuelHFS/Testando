<?php

#include_once 'C:/xampp/htdocs/PAcademia/PHP/bd/conecta.php'; #casa
#include_once 'C:/xampp/htdocs/PAcademia/PHP/model/Produto.php'; #casa

include_once  'C:/xampp/htdocs/ProAcademia/PHP/bd/conecta.php';
include_once 'C:/xampp/htdocs/ProAcademia/PHP/model/Produto.php';




class DaoProduto{

    public function inserir(Produto $produto){

        $conn = new Conecta();

        if($conn->conectadb()) {
        $nome = $produto->getNome();
        $vlrCompra = $produto->getvlrCompra();
        $vlrVenda = $produto->getvlrVenda();
        $qtdEstoque = $produto->getEstoque();

        $sql = "insert into produto values (null, '$nome', '$vlrCompra', '$vlrVenda', '$qtdEstoque')";

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

    //método para carregar lista de produtos do banco de dados do banco de dados 

    public function listarProdutosDAO(){
        $conn = new Conecta();

        if($conn->conectadb()){
            $sql = "select * from produto";
            $query = mysqli_query($conn->conectadb(), $sql);
            $lista = mysqli_fetch_array($query);
            return $lista;
        }
    }

}

