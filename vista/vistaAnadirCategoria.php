<!DOCTYPE html>
<head>
<meta charset="UTF-8" />
<title>Añadir categoria</title>

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


<form action="../controlador/controladorAnadirCategoria.php" method="post">
    <label for="fname">Categoria:</label>
    <input type="text" id="categoria" name="categoria" placeholder="insertar categoria...">
  
    <input type="submit" name="anadirCategoria" value="Anadir Categoria">
  </form>

</body>