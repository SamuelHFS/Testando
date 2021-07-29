<?php

include_once 'C:/xampp/htdocs/ProAcademia/PHPMatutinoPDO/bd/Conecta.php';
include_once 'C:/xampp/htdocs/ProAcademia/PHPMatutinoPDO/model/Produto.php';
include_once 'C:/xampp/htdocs/ProAcademia/PHPMatutinoPDO/model/Mensagem.php';
include_once 'C:/xampp/htdocs/ProAcademia/PHPMatutinoPDO/model/Fornecedor.php';

#include_once 'C:/xampp/htdocs/PHPMatutinoPDO/bd/Conecta.php';
#include_once 'C:/xampp/htdocs/PHPMatutinoPDO/model/Produto.php';
#include_once 'C:/xampp/htdocs/PHPMatutinoPDO/model/Mensagem.php';

#include_once 'C:/xampp/htdocs/PAcademia/PHPMatutinoPDO/bd/Conecta.php';
#include_once 'C:/xampp/htdocs/PAcademia/PHPMatutinoPDO/model/Produto.php';
#include_once 'C:/xampp/htdocs/PAcademia/PHPMatutinoPDO/model/Mensagem.php';


class DaoProduto
{

    public function inserir(Produto $produto)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if ($conecta) {
            $nomeProduto = $produto->getNomeProduto();
            $vlrCompra = $produto->getVlrCompra();
            $vlrVenda = $produto->getVlrVenda();
            $qtdEstoque = $produto->getQtdEstoque();
            $fornecedor = $produto->getFornecedor();
            try {
                $stmt = $conecta->prepare("insert into produto values "
                    . "(null,?,?,?,?,?)");
                $stmt->bindParam(1, $nomeProduto);
                $stmt->bindParam(2, $vlrCompra);
                $stmt->bindParam(3, $vlrVenda);
                $stmt->bindParam(4, $qtdEstoque);
                $stmt->bindParam(5, $fornecedor);
                $stmt->execute();
                $msg->setMsg("<p style='color: green;'>"
                    . "Dados Cadastrados com sucesso</p>");
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }
        } else {
            $msg->setMsg("<p style='color: red;'>"
                . "Erro na conexão com o banco de dados.</p>");
        }
        $conn = null;
        return $msg;
    }

    //método para atualizar dados da tabela produto
    public function atualizarProdutoDAO(Produto $produto)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if ($conecta) {
            $id = $produto->getIdProduto();
            $nomeProduto = $produto->getNomeProduto();
            $vlrCompra = $produto->getVlrCompra();
            $vlrVenda = $produto->getVlrVenda();
            $qtdEstoque = $produto->getQtdEstoque();
            $fornecedor = $produto->getFornecedor();
            try {
                $stmt = $conecta->prepare("update produto set "
                    . "nome = ?,"
                    . "vlrCompra = ?,"
                    . "vlrVenda = ?, "
                    . "qtdEstoque = ?, "
                    . "FKfornecedor = ? "
                    . "where id = ?");
                $stmt->bindParam(1, $nomeProduto);
                $stmt->bindParam(2, $vlrCompra);
                $stmt->bindParam(3, $vlrVenda);
                $stmt->bindParam(4, $qtdEstoque);
                $stmt->bindParam(5, $fornecedor);
                $stmt->bindParam(6, $id);
                $stmt->execute();
                $msg->setMsg("<p style='color: blue;'>"
                    . "Dados atualizados com sucesso</p>");
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }
        } else {
            $msg->setMsg("<p style='color: red;'>"
                . "Erro na conexão com o banco de dados.</p>");
        }
        $conn = null;
        return $msg;
    }

    //método para carregar lista de produtos do banco de dados
    public function listarProdutosDAO()
    {
        $msg = new Mensagem();
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        if ($conecta) {
            try {
                $rs = $conecta->query("SELECT * FROM produto inner join fornecedor "
                    . "on produto.FKfornecedor = fornecedor.idFornecedor");
                $lista = array();
                $a = 0;
                if ($rs->execute()) {
                    if ($rs->rowCount() > 0) {
                        while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {
                            $produto = new Produto();
                            $produto->setIdProduto($linha->id);
                            $produto->setNomeProduto($linha->nome);
                            $produto->setVlrCompra($linha->vlrCompra);
                            $produto->setVlrVenda($linha->vlrVenda);
                            $produto->setQtdEstoque($linha->qtdEstoque);

                            $form = new Fornecedor();
                            $form->setIdfornecedor($linha->idFornecedor);
                            $form->setNomeFornecedor($linha->nomeFornecedor);
                            $form->setLogradouro($linha->logradouro);
                            $form->setNumero($linha->numero);
                            $form->setComplemento($linha->complemento);
                            $form->setBairro($linha->bairro);
                            $form->setCidade($linha->cidade);
                            $form->setUf($linha->uf);
                            $form->setCep($linha->cep);
                            $form->setRepresentante($linha->representante);
                            $form->setEmail($linha->email);
                            $form->setTelFixo($linha->telFixo);
                            $form->setTelCel($linha->telCel);
                            $produto->setFornecedor($form);

                            $lista[$a] = $produto;
                            $a++;
                        }
                    }
                }
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }
            $conn = null;
            return $lista;
        }
    }

    //método para excluir produto na tabela produto
    public function excluirProdutoDAO($id)
    {
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $msg = new Mensagem();
        if ($conecta) {
            try {
                $stmt = $conecta->prepare("delete from produto "
                    . "where id = ?");
                $stmt->bindParam(1, $id);
                $stmt->execute();
                $msg->setMsg("<p style='color: #d6bc71;'>"
                    . "Dados excluídos com sucesso.</p>");
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }
        } else {
            $msg->setMsg("<p style='color: red;'>'Banco inoperante!'</p>");
        }
        $conn = null;
        return $msg;
    }

    //método para os dados de produto por id
    public function pesquisarProdutoIdDAO($id)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        $produto = new Produto();
        if ($conecta) {
            try {
                $rs = $conecta->prepare("select * from produto where "
                    . "id = ?");
                $rs->bindParam(1, $id);
                if ($rs->execute()) {
                    if ($rs->rowCount() > 0) {
                        while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {
                            $produto->setIdProduto($linha->id);
                            $produto->setNomeProduto($linha->nome);
                            $produto->setVlrCompra($linha->vlrCompra);
                            $produto->setVlrVenda($linha->vlrVenda);
                            $produto->setQtdEstoque($linha->qtdEstoque);
                        }
                    }
                }
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }
            $conn = null;
        } else {
            echo "<script>alert('Banco inoperante!')</script>";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
			 URL='../PHPMatutino01/cadastroProduto.php'\">";
        }
        return $produto;
    }
}
