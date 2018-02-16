<!DOCTYPE html>
<head>
<meta charset="UTF-8" />
<title>Añadir cliente</title>

<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>

</head>


<body>
<?php
    require_once "../controlador/controladorSeguridad.php";
?>

<a href="../vista/menu.php">Volver</a><br><br>


<form action="../controlador/controladorAnadirClienteConArticulos.php" method="post">
    <label for="fname">Nombre:</label>
    <input type="text" id="nombre" name="nombre" placeholder="insertar nombre...">
    <label for="fname">Apellido:</label>
    <input type="text" id="apellido" name="apellido" placeholder="insertar apellido...">
    <label for="fname">Teléfono:</label>
    <input type="text" id="telefono" name="telefono" placeholder="insertar telefono...">
    <label for="fname">Artículo 1:</label>
    <select name="articulo1">  
        <?php
            foreach ($datos as $itemArticulo){
                echo "<option value='" . $itemArticulo["idArticulo"] . "'>" . $itemArticulo["ArticuloDetalle"] . "</option>";
            }
        ?>
    </select>
    <label for="fname">Artículo 2:</label>
    <select name="articulo2">  
        <?php
            foreach ($datos as $itemArticulo){
                echo "<option value='" . $itemArticulo["idArticulo"] . "'>" . $itemArticulo["ArticuloDetalle"] . "</option>";
            }
        ?>
    </select>
    
    
    <input type="submit" name="anadirCliente" value="Anadir cliente">
  </form>

</body>