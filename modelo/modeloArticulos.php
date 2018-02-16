<?php
require_once '../core/conector.php';

class Articulo {
    private $link;
    private $articulos;
    
    public function __construct(){
        $this->link=Conectar::conexion();
        $this->articulos=array();
    }
    
    public function obtenerarticulos() {
        $sql="CALL spMostrararticulos()"; 
        $consulta=$this->link->query($sql);
        while ($row = mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
            $this->articulos[]=$row; 
        }
        $consulta->free_result();
        $this->link->close();
        return $this->articulos;
    }      
    
    
    public function insertarArticulo($pArticulo, $pPrecio,$pCategoria ) {
        $consulta=$this->link->query("CALL spInsertarArticulo('$pArticulo', $pPrecio,$pCategoria)");
    }
}
?>