<?php
    class conectar{
        public static function conexion() {
            try{
                $conexion = new PDO('mysql:host=localhost; dbname=2aw3_examenfinal', 'root', '');
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conexion->query("SET NAMES 'utf8mb4'");
            } catch (Exception $ex) {
                die ("error". $ex->getMessage());
                echo "Linea de error" . $ex->getLine();

            }
            return $conexion;
        }
    }

?>
