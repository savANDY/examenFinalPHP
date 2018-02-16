<?php

require_once '../modelo/modeloClientes.php';

$cliente = new Cliente();
$datos = $cliente->obtenerClientes();

require_once '../vista/vistaListadoClientes.php';

?>

