<?php

require_once '../modelo/modeloCategorias.php';

$pCategoria = htmlspecialchars(trim($_POST['categoria']));

$categoria=new Categoria();
$categoria->insertarCategoria($pCategoria);

header('Location: ../controlador/controladorListadoCategorias.php');

?>