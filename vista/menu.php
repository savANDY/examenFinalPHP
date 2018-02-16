<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Menú</title>
    </head>
    <body>

 <?php
    require_once "../controlador/controladorSeguridad.php";
?>
        <br>
        <br>
        <br>
        <div>
            <a href="../controlador/controladorListadoClientes.php" >Listado clientes</a><br>
            <a href="../controlador/controladorListadoClientesArticulos.php" >Listado de clientes con artículos</a><br>

            <a href="../vista/vistaAnadirCliente.php" >Añadir cliente</a><br>
            <a href="../controlador/controladorAnadirClienteConArticulosVista.php" >Añadir cliente con artículos (transacción)</a><br>
            <br><br>
            <a href="../controlador/controladorListadoArticulos.php" >Listado artículos</a><br>
            <a href="../controlador/controladorAnadirArticuloVista.php" >Añadir artículo</a><br>
            <br><br>
            <a href="../controlador/controladorListadoCategorias.php" >Listado categorías</a><br>
            <a href="../vista/vistaAnadirCategoria.php" >Añadir categoría</a><br>
            <br><br>
             <a href="../controlador/controladorCargarClientesDesdeFichero.php" >Cargar clientes desde fichero</a><br>
        </div>
    </body>
</html>
