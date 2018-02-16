<?php

require_once '../modelo/modeloArticulos.php';

$pArticulo = htmlspecialchars(trim($_POST['articulo']));
$pPrecio = htmlspecialchars(trim($_POST['precio']));
$pCategoria = htmlspecialchars(trim($_POST['categoria']));

$articulo=new Articulo();
$articulo->insertarArticulo($pArticulo, $pPrecio,$pCategoria );

header('Location: ../controlador/controladorListadoArticulos.php');

?>