<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Iniciar sessión </title>
</title>
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


<form action="controlador/controladorLogin.php" method="post">
    <label for="fname">usuario:</label>
    <input type="text" id="usuario" name="usuario" placeholder="insertar usuario...">
    <label for="fname">password:</label>
    <input type="text" id="password" name="password" placeholder="insertar password...">
    <input type="submit" name="login" value="Logearse">
  </form>

</body>
