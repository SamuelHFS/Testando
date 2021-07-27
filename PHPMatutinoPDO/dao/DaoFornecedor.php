<?php
#include_once 'C:/xampp/htdocs/PHPMatutinoPDO/bd/Conecta.php';
#include_once 'C:/xampp/htdocs/PHPMatutinoPDO/model/Produto.php';
#include_once 'C:/xampp/htdocs/PHPMatutinoPDO/model/Mensagem.php';

include_once 'C:/xampp/htdocs/PAcademia/PHPMatutinoPDO/bd/Conecta.php';
include_once 'C:/xampp/htdocs/PAcademia/PHPMatutinoPDO/model/Fornecedor.php';
include_once 'C:/xampp/htdocs/PAcademia/PHPMatutinoPDO/model/Mensagem.php';

class DaoProduto {

    public function inserir(Fornecedor $fornecedor){
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if($conecta){
            
            $nomeFornecedor = $fornecedor->getNomeFornecedor();
            $logradouro = $fornecedor->getLogradouro();
            $numero = $fornecedor->getNumero();
            $complemento = $fornecedor->getComplemento();
            $bairro = $fornecedor->getBairro();
            $cidade = $fornecedor->getCidade();
            $uf = $fornecedor->getUf();
            $cep = $fornecedor->getCep();
            $representante = $fornecedor->getRepresentante();
            $email = $fornecedor->getEmail();
            $telFixo = $fornecedor->getTelFixo();
            $telCel= $fornecedor->getTelCel();
            try {
                $stmt = $conecta->prepare("insert into produto values "
                        . "(null,?,?,?,?,?,?,?,?,?,?,?,?)");
                $stmt->bindParam(1, $nomeFornecedor);
                $stmt->bindParam(2, $logradouro);
                $stmt->bindParam(3, $numero);
                $stmt->bindParam(4, $complemento);
                $stmt->bindParam(5, $bairro);
                $stmt->bindParam(6, $cidade);
                $stmt->bindParam(7, $uf);
                $stmt->bindParam(8, $cep);
                $stmt->bindParam(9, $representante);
                $stmt->bindParam(10, $email);
                $stmt->bindParam(11, $telFixo);
                $stmt->bindParam(12, $telCel);
                $stmt->execute();
                $msg->setMsg("<p style='color: green;'>"
                        . "Dados Cadastrados com sucesso</p>");
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }
        }else{
            $msg->setMsg("<p style='color: red;'>"
                        . "Erro na conexão com o banco de dados.</p>");
        }
        $conn = null;
        return $msg;
    }
    
    //método para atualizar dados da tabela fornecedor
    public function atualizarFornecedorDAO(Produto $fornecedor){
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if($conecta){
            $id = $fornecedor->getIdProduto();
            $nomeProduto = $fornecedor->getNomeProduto();
            $vlrCompra = $fornecedor->getVlrCompra();
            $vlrVenda = $fornecedor->getVlrVenda();
            $qtdEstoque = $fornecedor->getQtdEstoque();
            try{
                $stmt = $conecta->prepare("update produto set "
                        . "nome = ?,"
                        . "vlrCompra = ?,"
                        . "vlrVenda = ?, "
                        . "qtdEstoque = ? "
                        . "where id = ?");
                $stmt->bindParam(1, $nomeProduto);
                $stmt->bindParam(2, $vlrCompra);
                $stmt->bindParam(3, $vlrVenda);
                $stmt->bindParam(4, $qtdEstoque);
                $stmt->bindParam(5, $id);
                $stmt->execute();
                $msg->setMsg("<p style='color: blue;'>"
                        . "Dados atualizados com sucesso</p>");
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }
        }else{
            $msg->setMsg("<p style='color: red;'>"
                        . "Erro na conexão com o banco de dados.</p>");
        }
        $conn = null;
        return $msg;
    }
    
    //método para carregar lista de produtos do banco de dados
    public function listarProdutosDAO(){
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        if($conecta){
            try {
                $rs = $conecta->query("select * from produto");
                $lista = array();
                $a = 0;
                if($rs->execute()){
                    if($rs->rowCount() > 0){
                        while($linha = $rs->fetch(PDO::FETCH_OBJ)){
                            $fornecedor = new Produto();
                            $fornecedor->setIdProduto($linha->id);
                            $fornecedor->setNomeProduto($linha->nome);
                            $fornecedor->setVlrCompra($linha->vlrCompra);
                            $fornecedor->setVlrVenda($linha->vlrVenda);
                            $fornecedor->setQtdEstoque($linha->qtdEstoque);
                            $lista[$a] = $fornecedor;
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
    public function excluirProdutoDAO($id){
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $msg = new Mensagem();
        if($conecta){
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
        }else{
            $msg->setMsg("<p style='color: red;'>'Banco inoperante!'</p>"); 
        }
        $conn = null;
        return $msg;
    }
    
    //método para os dados de produto por id
    public function pesquisarProdutoIdDAO($id){
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $fornecedor = new Produto();
        if($conecta){
            try {
                $rs = $conecta->prepare("select * from produto where "
                        . "id = ?");
                $rs->bindParam(1, $id);
                if($rs->execute()){
                    if($rs->rowCount() > 0){
                        while($linha = $rs->fetch(PDO::FETCH_OBJ)){
                            $fornecedor->setIdProduto($linha->id);
                            $fornecedor->setNomeProduto($linha->nome);
                            $fornecedor->setVlrCompra($linha->vlrCompra);
                            $fornecedor->setVlrVenda($linha->vlrVenda);
                            $fornecedor->setQtdEstoque($linha->qtdEstoque);
                        }
                    }
                }
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }  
            $conn = null;
        }else{
            echo "<script>alert('Banco inoperante!')</script>";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
			 URL='../PHPMatutino01/cadastroProduto.php'\">"; 
        }
        return $fornecedor;
    }
}
