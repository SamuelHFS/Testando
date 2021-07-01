<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Pagamento</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">



    <!-- Bootstrap core CSS -->

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Favicons -->
        <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
        <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
        <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
        <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
        <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
        <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
        <meta name="theme-color" content="#7952b3">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            .btInput{
                padding-left: 35%;
                padding-right: 40%;
                margin-left: 50%;
               
               
            }

            .teste{
              background-color: gray;
               
            }

            .btInput2{
                
                padding: 0.3875em 1em 0.1275em;
    			display: inline-block;
    			padding: 10px 20px;
    			margin-bottom: 0;
                
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }

            
        </style>


        <!-- Custom styles for this template -->
        <link href="css/formulario.css" rel="stylesheet">
</head>

<body class="bg-light">

<header>
    <nav class="navbar navbar-expand-lg navbar-dark
            bg-dark m5">
           
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Cadastro Cliente</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
          aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="login.html">Login</a>
            </li>
            
              <a class="nav-link" href="#">Vantagens</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" aria-disabled="true">Teste</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#">Contato</a>
            </li>
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
   </header>

    
        <main>
        
            <div class="container">
            <div class="teste"><div class="py-5 text-center border border-secondary">
                <h2>Faça Seu Cadastro</h2>
            </div>
        </div>
        
            <div class="row">

                <div class="col-md-7 col-lg-8 ">
                    <h4 class="mb-3">Informações</h4>
                    <form class="needs-validation" novalidate>

                        <div class="row g-6">
                            <div class="col-md-1">
                                <label for="code" class="form-label">Código</label>
                                <input type="text" class="form-control" id="codigo" name="codigo" placeholder="" value="" required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>

                            
                            <div class="col-md-5">
                                <label for="firstName" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="" value="" required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>

                            <div class="col-md-6"> 
                    <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
                    <input type="date" class="form-control" name="nascimento" id="nascimento" required>
          
                </div>

                

                            <div class="col-12">
                                <label for="username" class="form-label">Login</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="you@example.com"
                                        required>
                                    <div class="invalid-feedback">
                                        Your username is required.
                                    </div>
                                </div>
                            </div>
                    
                            <div class="col-md-3">
                                <label for="email" class="form-label">Senha
                                <input type="email" class="form-control" id="senha" name="senha" placeholder>
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="email" class="form-label">Confirmar Senha
                                <input type="email" class="form-control" id="senha2" name="senha2" placeholder>
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>

                            

                            <div class="col-md-6 ">
                                <label for="state" class="form-label" name="perfil">Perfil</label>
                                <select class="form-select" id="state" required>
                                    <option value="">Cliente</option>
                                    <option>Funcionário</option>

                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>

                            <div class="col-md-4 ">
                                <label for="email" class="form-label">E-mail 
                                <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>



                            <div class="col-md-2 ">
                                <label for="zip" class="form-label" name="cpf">CPF</label>
                                <input type="text" class="form-control" id="zip" placeholder="" required>
                                <div class="invalid-feedback">
                                    Zip code required.
                                </div>
                            </div>

                            
                        </div>
                        <hr style="width:150%" class="my-6   ">

                       
                        <div class="col-md-4 offset-md-5">
                            <input type="submit" name="cadastrar" class="btn btn-outline-primary" value="Enviar">&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="Reset" name="Cancelar" class="btn btn-outline-danger" value="Limpar">
                        </div>
                    </form>
                </div>
            </div>
      
        </main>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 2017–2021 Academia Firme&Forte</p>
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

</html>