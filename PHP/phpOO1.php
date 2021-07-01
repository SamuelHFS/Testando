<?php
    require_once "model/produto.php";

    $p = new Produto();
    
    $p->setId(10);
    $p->setNome("Tênis") ;
    $p->setvlrCompra(15);
    $p->setvlrVenda(15);
    $p->setEstoque(50);


    echo "Dados do Produto: <br> ";
    echo "Código: " . $p->getId() . "<br>";
    echo "Produto: " . $p->getNome() . "<br>";
    echo "Valor de compra: " . $p->getvlrCompra() . "<br>";
    echo "Valor de venda: " . $p->getvlrVenda() . "<br>";
    echo "Quantidade de Estoque: " . $p->getEstoque() . "<br>";

    $id = $p->getId();
    $nome = $p->getNome();
    $vlrC = $p->getVlrCompra();
    $vlrV = $p->getVlrVenda();
    $est = $p->getEstoque();

    $db = mysqli_connect("localhost : 3306","root","senac","Produto1");
    $sql = "insert into protudot values ('$id' , '$vlrC', '$vlrV ', '$est')";
    mysqli_query($db, $sql);
    ?>