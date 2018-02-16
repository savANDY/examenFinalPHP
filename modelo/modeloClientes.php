<?php
require_once '../core/conector.php';

class Cliente {
    private $link;
    private $cliente;

    public function __construct(){
        $this->link=Conectar::conexion();
        $this->cliente=array();
    }

    public function obtenerClientes() {
        $sql="CALL spMostrarClientes()";
        $consulta=$this->link->query($sql);
        while ($row = mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
            $this->cliente[]=$row;
        }
        $consulta->free_result();
        $this->link->close();
        return $this->cliente;
    }

    public function obtenerClientesArticulos() {
        $sql="CALL spMostrarClientesArticulos()";
        $consulta=$this->link->query($sql);
        while ($row = mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
            $this->cliente[]=$row;
        }
        $consulta->free_result();
        $this->link->close();
        return $this->cliente;
    }


        public function insertarCliente($pNombre, $pApellido,$pTelefono ) {
        $consulta=$this->link->query("CALL spInsertarCliente('$pNombre', '$pApellido','$pTelefono')");
    }

    public function aniadirClientesArticulos($pNombre, $pApellido,$pTelefono, $pArticulo1, $pArticulo2) {


      // Se desactiva el autocomit, entonces los querys no se haran automaticamente
    $this->link->autocommit(false);
    $stop = false; // Usaremos esta variable para saber si hay errores
    $sql1="CALL spInsertarCliente('$pNombre', '$pApellido','$pTelefono')";
    $result = $this->link->query($sql1);// Intentamos hacer el primer query

    // Código para seleccionar el id del cliente introducido
    foreach ($result as $res){
      $idClienteIntroducidoarr=$res;
    }
    $idClienteIntroducido = $idClienteIntroducidoarr['ultimoId'];

    if ($this->link->errno) {
      $stop = true; // Si entro aqui, habra un error, entonces STOP!
      echo "Error: " . $this->link->error . ". ";
    }

    // codigo para liberar el result
    while($this->link->more_results()){
      $this->link->next_result();
      $this->link->use_result();
    }

      $sqlArticulo1 = "CALL spInsertarClienteArticulo('$idClienteIntroducido', '$pArticulo1')";
      $result = $this->link->query($sqlArticulo1);
      // codigo para liberar el result
      while($this->link->more_results()){
        $this->link->next_result();
        $this->link->use_result();
      }
      if ($this->link->errno) {
        $stop = true; // Si entro aqui, habra un error, entonces STOP!
        echo "No se ha podido insertar el articulo " . $pArticulo1 . ". Error: " . $this->link->error . ". ";
      }

      $sqlArticulo2 = "CALL spInsertarClienteArticulo('$idClienteIntroducido', '$pArticulo2')";
      $result = $this->link->query($sqlArticulo2);
      // codigo para liberar el result
      while($this->link->more_results()){
        $this->link->next_result();
        $this->link->use_result();
      }
      if ($this->link->errno) {
        $stop = true; // Si entro aqui, habra un error, entonces STOP!
        echo "No se ha podido insertar el articulo " . $pArticulo2 . ". Error: " . $this->link->error . ". ";
      }

    if ($stop == false) { // Si no ha habido ningun error, se meteran a la base de datos todos los querys
      $this->link->commit();
      echo "Datos insertados correctamente";
    } else {
      $this->link->rollback(); // Si hay error, se anulan todos los querys
      echo "No se han metido datos a la base de datos";
    }
    $this->link->close();
    //return $this->cliente;
    }

}
?>
