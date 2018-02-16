<?php

session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  print("Hola, " . $_SESSION['usuario']);
  print(' <a href="../controlador/controladorCerrarSesion.php">Cerrar sesión</a>');
} else {
header('Location: ../index.php');
}


 ?>




        <br>
        <br>
