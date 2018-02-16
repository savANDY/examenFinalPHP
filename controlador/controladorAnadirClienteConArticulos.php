<?php

require_once '../modelo/modeloClientes.php';

$pNombre = $_POST['nombre'];
$pApellido = $_POST['apellido'];
$pTelefono = $_POST['telefono'];
$pArticulo1 = $_POST['articulo1'];
$pArticulo2 = $_POST['articulo2'];

$cliente = new Cliente();
$datos = $cliente->aniadirClientesArticulos($pNombre, $pApellido,$pTelefono, $pArticulo1, $pArticulo2);



//header('Location: ../controlador/controladorListadoClientes.php');

?>
