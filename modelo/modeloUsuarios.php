<?php

//session_start();

require_once '../core/conector.php';

class Usuario {
    private $link;
    private $usuarios;

    public function __construct(){
        $this->link=Conectar::conexion();
        $this->usuarios=array();
    }

    public function comprobarUsuario($usuario, $password) {
       $sql="SELECT fComprobarUsuario('$usuario', '$password') AS existe";
       $consulta=$this->link->query($sql);
       while ($row = mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
           $this->usuarios[]=$row;
       }
       $consulta->free_result();
       $this->link->close();
//        return $this->cliente;
       return $this->usuarios[0]["existe"];
    }







}
?>
