<?php

session_start();

require_once '../modelo/modeloUsuarios.php';

//Comprueba que vienes a la pagina desde el login
if (isset($_POST['usuario'])){

  $usuario = $_POST['usuario'];
  $password = $_POST['password'];

  $login = new Usuario();
  $datos = $login->comprobarUsuario($usuario, $password);

  //$comprobar= json_encode($datos);
  //print $comprobar;
  //print $datos;

  if ($datos == 1) {

      $_SESSION['loggedin'] = true;
      $_SESSION['usuario'] = $usuario;
      $_SESSION['start'] = time();
      $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);

    header('Location: ../vista/menu.php');
  } else {
    print ("Error. Usuario o contraseña no coinciden con la BBDD");
  }

// Error por si entras a la página manualmente
} else {
  print ("Error al loguearte");
}
?>
