<?php

require_once '../modelo/modeloCategorias.php';

$categoria = new Categoria();
$datos = $categoria->obtenercategorias();

require_once '../vista/vistaAnadirArticulo.php';

?>