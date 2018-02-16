<?php

require_once '../modelo/modeloCategorias.php';

$categoria = new Categoria();
$datos = $categoria->obtenerCategorias();

require_once '../vista/vistaListadoCategorias.php';

?>

