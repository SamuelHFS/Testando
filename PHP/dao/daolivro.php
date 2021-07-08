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
            if ($result) {
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
        }
            mysqli_close($conn->conectadb());
            return $lista;
        }
    }
    //médtodo para excluir livro na tablea livro

    public function excluirLivroDAO($id){
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        if($conecta){
            $sql = "delete from livro where id = '$id'";
            mysqli_query($conecta, $sql);
            header("Location: ../cadastrolivro.php");
            mysqli_close($conecta);
            exit;
        }else{
            echo "<script>alert('Banco não encontradao')</script>";
            header("Location: ../cadastrolivro.php");
            #echo "<META HTTP-EQUIV='REFRESH' CONTENT=\0";
            #URL='../cadastrolivro.PHP'\">";
        }

        }

        //método para os dados de livro id 
        public function pesquisarLivroIdDAO($id){
            $conn = new Conecta();
            $conecta = $conn->conectadb();
            $livro = new Livro();
            if($conecta){
                $sql = "delete from livro where id = '$id'";
                $result = mysqli_query($conecta,  $sql);
                $linha = mysqli_fetch_assoc($result);
                
                if($linha){
                    do{
                        $livro->setId($linha['id']);
                        $livro->setTitulo($linha['titulo']);
                        $livro->setAutor($linha['autor']);
                        $livro->setEditora($linha['editora']);
                        $livro->setQtdEstoque($linha['estoque']);

                    }while ($linha = mysqli_fetch_assoc($result));
                }
                mysqli_close($conecta);
                
            }else{
                echo "<script>alert('Banco não encontradao')</script>";
                #header("Location: ../cadastrolivro.php");
                echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
                URL='https://localhost/ProAcademia/cadastroLivro.php\">";

                
            }
                return $livro;
            }
    }



  