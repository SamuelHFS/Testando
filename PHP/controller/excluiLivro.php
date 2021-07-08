<?php

include_once 'C:/xampp/htdocs/ProAcademia/PHP/controller/LivroController.php';

$id = $_REQUEST['ide'];
$lc = new LivroController();
$lc->excluirLivro($id);