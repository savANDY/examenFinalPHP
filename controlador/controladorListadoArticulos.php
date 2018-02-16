<?php

require_once '../modelo/modeloArticulos.php';

$articulo = new Articulo();
$datos = $articulo->obtenerArticulos();

require_once '../vista/vistaListadoArticulos.php';

?>

