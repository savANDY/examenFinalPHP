<?php
session_start();

if (session_status() == PHP_SESSION_ACTIVE) {
  unset ($_SESSION['loggedin']);
  session_destroy();
  header('Location: ../index.php');
} else {
  print("No estás logueado para poder cerrar sesion");
}



?>
