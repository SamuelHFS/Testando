<?php

include_once 'C:/xampp/htdocs/PAcademia/PHP/controller/LivroController.php';

$id = $_REQUEST['ide'];
$lc = new LivroController();
$lc->excluirLivro($id);