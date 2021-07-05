<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            .btInput{
                padding: 10px 20px 10px 20px;
                margin-top: 20px;
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown link
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row" style="margin-top: 30px;">
                <div class="col-8 offset-2">

                    <div class="card-header bg-light text-center border"
                         style="padding-bottom: 15px; padding-top: 15px;">
                        Cadastro de Cliente
                    </div>
                    <?php
                    //envio dos dados para o BD
                    if (isset($_POST['cadastrar'])) {
                        include_once 'controller/PessoaController.php';
                        

                        $nome = $_POST['nome'];
                        $dtNasc = $_POST['dtNasc'];
                        $login = $_POST['login'];
                        $senha = $_POST['senha'];
                        $perfil = $_POST['perfil'];
                        $cpf = $_POST['cpf'];
                        $email = $_POST['email'];

                        $pc = new PessoaController();
                        echo "<p>".$pc->inserirPessoa($nome, $dtNasc, 
                            $login, $senha, $perfil, $email, $cpf)."</p>";
                    }
                    ?>
                    <div class="card-body border">
                        <form method="post" action="">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Código: </label> <br> 
                                    <label>Nome Completo</label>  
                                    <input class="form-control" type="text" 
                                           name="nome">
                                    <label>Data de Nascimento</label>  
                                    <input class="form-control" type="date" 
                                           name="dtNasc">  
                                    <label>E-Mail</label>  
                                    <input class="form-control" type="email" 
                                           name="email"> 
                                    <label>CPF</label>  
                                    <input class="form-control" type="text" 
                                           name="cpf">
                                </div>
                                <div class="col-md-6">
                                    <br>
                                    <label>Login</label>  
                                    <input class="form-control" type="text" 
                                           name="login">  
                                    <label>Senha</label>  
                                    <input class="form-control" type="password" 
                                           name="senha"> 
                                    <label>Conf. Senha</label>  
                                    <input class="form-control" type="password" 
                                           name="senha2"> 
                                    <label>Perfil</label>  
                                    <select name="perfil" class="form-control">
                                        <option>[--Selecione--]</option>
                                        <option>Cliente</option>
                                        <option>Funcionário</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 offset-4">
                                <input type="submit" name="cadastrar"
                                       class="btn btn-success btInput" value="Enviar">
                                &nbsp;&nbsp;
                                <input type="reset" 
                                       class="btn btn-light btInput" value="Limpar">
                            </div>
<<<<<<< HEAD



                            <div class="col-md-2 ">
                                <label for="zip" class="form-label" name="cpf">CPF</label>
                                <input type="text" class="form-control" id="zip" placeholder="" required>
                                <div class="invalid-feedback">
                                    Zip code required.
                                </div>
                            </div>

                            
                        </div>
                        <hr style="width:150%" class="my-6   ">

                       
                        <div class="col-md-6 offset-md-5">
                            <input type="submit" name="cadastrar" class="btn btn-outline-primary" value="Enviar">&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="Reset" name="Cancelar" class="btn btn-outline-danger" value="Limpar">
                        </div>
                    </form>
                </div>
            </div>
      
        </main>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 2017–2021 Cadastro Pessoa</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacidade</a></li>
                <li class="list-inline-item"><a href="#">Termos</a></li>
                <li class="list-inline-item"><a href="#">Suporte</a></li>
            </ul>
        </footer>
    </div>


    <?php
    //envio dos dados para o banco de dados bd

    if(isset($_POST['cadastrar'])){
            $nome = $_POST['nome'];
            $nome = $_POST['nascimento'];
            $nome = $_POST['usuario'];
            $nome = $_POST['senha'];
            $nome = $_POST['senha2'];
            $nome = $_POST['perfil'];
            $nome = $_POST['cpf'];
            $nome = $_POST['email'];

            $pc = new PessoaController();
            $pc->inserirPessoa($nome, $dtNasc, $login, $senha,
            $perfil, $email, $cpf);
 
    }
    ?>

    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="/js/formularioacad.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
    integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
    crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
=======
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
>>>>>>> be294fadcd332bf5b4247f6537fde1c4a15fb59f

