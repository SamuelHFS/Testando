<?php
#include_once 'C:/xampp/htdocs/ProAcademia/PHP/controller/LivroController.php';
include_once 'C:/xampp/htdocs/PAcademia/PHP/controller/LivroController.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .btInput {
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

                <div class="card-header bg-light text-center border" style="padding-bottom: 15px; padding-top: 15px;">
                    Cadastro de Livro
                </div>
                <?php
                //envio dos dados para o BD
                if (isset($_POST['cadastrarLivro'])) {
                    
                    $titulo = ($_POST['titulo']);
                        if($titulo !=""){
                    $autor = $_POST['autor'];
                    $editora = $_POST['editora'];
                    $qtdEstoque = $_POST['qtdEstoque'];

                    $pc = new LivroController();
                    unset($_POST['cadastrarLivro']);
                    echo "<p>" . $pc->inserirLivro(
                        $titulo,
                        $autor,
                        $editora,
                        $qtdEstoque
                    ) . "</p>";
                    echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                URL='cadastroLivro.php'\">";
                }
            }
                ?>




                <div class="card-body border">
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <label>Código: </label> <br>
                                <label>Título: </label>
                                <input class="form-control" type="text" name="titulo">
                                <label>Autor</label>
                                <input class="form-control" type="text" name="autor">
                                <label>Editora</label>
                                <input class="form-control" type="text" name="editora">
                                <label>Quantidade Estoque</label>
                                <input class="form-control" type="number" name="qtdEstoque">

                                <!--Mudar o NAME do BOTÃO-->
                                <input type="submit" name="cadastrarLivro" class="btn btn-success btInput" value="Enviar">
                                &nbsp;&nbsp;
                                <input type="reset" class="btn btn-danger btInput" value="Limpar">


                            </div>
                            <div class="container-fluid ">
    <div class="row">
        <div class="col-md-12 offset-md-12">
            <table class="table">
                <thead class="thead-light bg-dark text-white">
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Editora</th>
                        <th scope="col">Estoque</th>
                        <th scope="col-md-6">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $pcTable = new LivroController();
                    $listaLivros = $pcTable->listarLivros();
                    $a = 0;
                    if ($listaLivros!= null) {
                    foreach ($listaLivros as $li) {
                        $a++;
                    ?>
                        <tr>
                            <td><?php print_r($li->getId()); ?></td>
                            <td><?php print_r($li->getTitulo()); ?></td>
                            <td><?php print_r($li->getAutor()); ?></td>
                            <td><?php print_r($li->getEditora()); ?></td>
                            <td><?php print_r($li->getQtdEstoque()); ?></td>
                            <td><a class="btn btn-outline-dark" href="#">Editar</a>
                                <a class="btn btn-outline-danger" href="#">Excluir</a>
                            </td>
                        </tr>

                    <?php
                    }
                }

                    ?>


                </tbody>
            </table>

        </div>
    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
            var myModal = document.getElementById('myModal')
            var myInput = document.getElementById('myInput')

            myModal.addEventListener('shown.bs.modal', function () {
                myInput.focus()
            })
    </script> 
</body>

</html>