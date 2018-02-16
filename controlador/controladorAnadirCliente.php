<?php

require_once '../modelo/modeloClientes.php';

$pNombre = htmlspecialchars(trim($_POST['nombre']));
$pApellido = htmlspecialchars(trim($_POST['apellido']));
$pTelefono = htmlspecialchars(trim($_POST['telefono']));

$cliente=new Cliente();
$cliente->insertarCliente($pNombre,$pApellido,$pTelefono);

header('Location: ../controlador/controladorListadoClientes.php');

?>