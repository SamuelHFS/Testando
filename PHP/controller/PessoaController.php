<?php
include_once '../dao/daopessoa.php.php';

class PessoaController{
    public function inserirPessoa($nome, $dtNasc, $login, $senha, $perfil, $email, $cpf ){
        $pessoa = new Pessoa();
        $pessoa->setNome($nome);
        $pessoa->setDtNasc($dtNasc);
        $pessoa->setLogin($login);
        $pessoa->setSenha($senha);
        $pessoa->setPerfil($perfil);
        $pessoa->setEmail($email);
        $pessoa->setCpf($cpf);

        $daoPessoa = new daopessoa();
        $daoPessoa->inserir($pessoa);
    }
}