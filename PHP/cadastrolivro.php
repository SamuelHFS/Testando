<?php
include_once 'C:/xampp/htdocs/ProAcademia/PHP/controller/LivroController.php';
#include_once 'C:/xampp/htdocs/PAcademia/PHP/controller/LivroController.php'; #casa
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
                                <input class="form-control" type="text" name="titulo" value="<?php echo $li->getId(); ?>">
                                <label>Autor</label>
                                <input class="form-control" type="text" name="autor">
                                <label>Editora</label>
                                <input class="form-control" type="text" name="editora">
                                <label>Quantidade Estoque</label>
                                <input class="form-control" type="number" name="qtdEstoque">

                                <!--Mudar o NAME do BOTÃO-->
                                <input type="submit" name="cadastrarLivro" class="btn btn-success btInput" value="Enviar">
                                &nbsp;&nbsp;
                                <input type="submit" class="btn btn-danger btInput" value="Limpar">


                            </div>
                            <div class="container-fluid ">
                            <div class="row" style="margin-top: 30px;">
            <table class="table table-striped table-responsive">
                <thead class="table-dark">
                    <tr><th>Código</th>
                        <th>titulo</th>
                        <th>autor</th>
                        <th>editora</th>
                        <th>Quantidade estoque</th>
                        <th>Ações</th>
                        </tr>
                </thead>
                <tbody>
                    <?php
                    $pcTable = new LivroController();
                    $listaLivros = $pcTable->listarLivros();
                    $a = 0;
                    if ($listaLivros != null) {
                        foreach ($listaLivros as $li) {
                            $a++;
                            ?>
                            <tr>
                                <td><?php print_r($li->getId()); ?></td>
                                <td><?php print_r($li->getTitulo()); ?></td>
                                <td><?php print_r($li->getAutor()); ?></td>
                                <td><?php print_r($li->getEditora()); ?></td>
                                <td><?php print_r($li->getQtdEstoque()); ?></td>
                                
                                <td><a class="btn btn-light" 
                                       href="controller/editaLivro.php?id=<?php echo $li->getId(); ?>">
                                        Excluir</a>
                                    <button type="button" 
                                            class="btn btn-light" data-bs-toggle="modal" 
                                            data-bs-target="#exampleModal<?php echo $a;?>">
                                        Deletar</button></td>
                            </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?php echo $a;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form method="get" action="controller/excluiLivro.php">
                                <label><strong>Deseja Excluir o livro
                                <?php echo $li->getTitulo(); ?>?</strong></label>
                                    <input type="hidden" name="ide" value="<?php echo $li->getId(); ?>">
                               
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Sim</button>
                                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                </div> 
                                </form>
                            </div>
                        </div>
                    </div>
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