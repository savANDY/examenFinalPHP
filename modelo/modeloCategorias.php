<?php
require_once '../core/conector.php';

class Categoria {
    private $link;
    private $categorias;
    
    public function __construct(){
        $this->link=Conectar::conexion();
        $this->categorias=array();
    }
    
    public function obtenercategorias() {
        $sql="CALL spMostrarCategorias()"; 
        $consulta=$this->link->query($sql);
        while ($row = mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
            $this->categorias[]=$row; 
        }
        $consulta->free_result();
        $this->link->close();
        return $this->categorias;
    }      
    
    public function insertarCategoria($pCategoria) {
        $consulta=$this->link->query("CALL spInsertarCategoria('$pCategoria')");
    }
    

}
    

?>