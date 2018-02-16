<?php

require_once '../modelo/modeloClientes.php';

$cliente = new Cliente();
$datos = $cliente->obtenerClientesArticulos();

require_once '../vista/vistaListadoClientesArticulos.php';

?>
