<?php

include_once  'C:/xampp/htdocs/ProAcademia/PHP/bd/conecta01.php';
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
}

