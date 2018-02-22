<?php

require_once '../core/conector.php';

class Fichero{
  private $link;
  private $clientes;

  public function __construct(){
      $this->link=Conectar::conexion();
      $this->clientes=array();
  }

  // public function crear_contacto_Fichero($nombre,$apellido,$telefono) {
  //       if ($opcion = "I") {
  //         $sql=("SELECT * FROM clientes WHERE (Nombre like '$nombre') AND (Apellidos like '$apellido') AND (telefono like '$telefono')");
  //         print ($sql);
  //
  //         $contador = 0;
  //
  //         foreach ($this->link->query($sql) as $res)
  //         {
  //           $contador ++;
  //             $this->contactos[]=$res;
  //         }
  //         // return $this->contactos;
  //         //$this->db=null;
  //
  //         print("CONTADOR: " . $contador);
  //
  //         if ($contador == 0){
  //     $this->link->query("INSERT INTO clientes(Nombre,Apellidos,Telefono) VALUES('$nombre','$apellido','$telefono')");
  //   }  else {
  //         print("Ya existe ". $nombre." ".$apellido." ".$telefono . " en la BBDD.");
  //       }
  //
  //   } else if ($opcion = "E") {
  //     $consulta=$this->link->query("DELETE FROM clientes WHERE Nombre like '$nombre' AND Apellidos like '$apellido' AND telefono like '$telefono'");
  //   } else {
  //     print("No se ha podido procesar la operacion.");
  //   }
  // }

// ME DA UN ERROR RARO, AL NO HABER INTERNET ME PARECE IMPOSIBLE ARREGLARLO...
  public function crear_contacto_Fichero($nombre, $apellido, $telefono, $opcion){

    if ($opcion == "I") {
      //echo("Opcion I");
      $sql=("SELECT * FROM clientes WHERE (Nombre like '$nombre') AND (Apellidos like '$apellido') AND (telefono like '$telefono')");
      //print ($sql);

      $contador = 0;

      foreach ($this->link->query($sql) as $res)
      {
        $contador ++;
          $this->contactos[]=$res;
      }
      // return $this->contactos;
      //$this->db=null;

      print("CONTADOR: " . $contador);

      if ($contador == 0){
        // $sqlI="INSERT INTO clientes(Nombre,Apellidos,Telefono) VALUES(?,?,?)";
        // $sqlPrep = $this->db->prepare($sqlI);
      	// $sqlPrep->bindParam(':Nombre',$nombre, PDO::PARAM_STR, 30);
      	// $sqlPrep->bindParam(':Apellidos',$apellido, PDO::PARAM_STR, 50);
      	// $sqlPrep->bindParam(':Telefono',$telefono, PDO::PARAM_STR, 20);
      	// $sqlPrep->execute();
      	//$this->db=null;

        //
        // $sql="INSERT INTO clientes(Nombre,Apellidos,Telefono,Poblacion) VALUES(?,?,?)";// ? el simbolo de interrogacion es el parametro
      	// $sqlPrep->bind_param("s","s","i",$nombre,$apellido,$telefono);  //este sirve para cuando hago la conexion con mysqli
      	// $sqlPrep->bindParam("s","s","i", $nombre,$apellido,$telefono); // las "s" y "i" significan el tipo que es cada parametro, por ejemplo "s" es string
      	// $this->link->close(); //este sirve para cerrar un mysqli


      $query="INSERT INTO `clientes`(`Nombre`, `Apellidos`, `Telefono`) VALUES(?,?,?)";// ? sinboloak parametroa adierazten du
      $sqlPrep = $this->link->prepare($query);
      //print($this->link->error);
      print($query);
      $sqlPrep->bind_param("ssi",$nombre,$apellido,$telefono);
      print($this->link->error);
      $sqlPrep->execute();
      print($this->link->error);
      $this->link->close();
    } else {
      print("Ya existe ". $nombre." ".$apellido." ".$telefono . " en la BBDD.<br>");
    }

} else if ($opcion = "E") {
  $consulta=$this->link->query("DELETE FROM clientes WHERE Nombre like '$nombre' AND Apellidos like '$apellido' AND telefono like '$telefono'");
  echo("Borrado " . $nombre . " " . $apellido . "<br>");
} else {
  print("No se ha podido procesar la operacion.<br>");
}
$this->link=null;
}

}

?>
