<?php

require_once '../modelo/modeloCargarFicheros.php';

$fichero=new Fichero();

$lineas = file('../datos/clientes.txt');
    foreach ($lineas as $num_linea => $linea) {
//        echo "Línea #<b>{$num_linea}</b> : " . htmlspecialchars($linea) . "<br />\n";
        $contacto = explode(":", $linea);
        $fichero = new Fichero() ;
        $fichero->crear_contacto_Fichero($contacto[0], $contacto[1], $contacto[2]);
    }

header('Location: ../controlador/controladorListadoClientes.php');
?>
