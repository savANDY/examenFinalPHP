<?php

require_once '../modelo/modeloCargarFicheros.php';

$fichero=new Fichero();

$lineas = file('../datos/clientes.txt');
    foreach ($lineas as $num_linea => $linea) {
//        echo "Línea #<b>{$num_linea}</b> : " . htmlspecialchars($linea) . "<br />\n";
        $contacto = explode(":", $linea);
        $fichero = new Fichero() ;
        $fichero->crear_contacto_Fichero(trim($contacto[0]), trim($contacto[1]), trim($contacto[2]),trim($contacto[3]));
    }

//header('Location: ../controlador/controladorListadoClientes.php');
?>
