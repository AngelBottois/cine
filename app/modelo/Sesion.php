<?php
// include_once 'Conexion.php';
class Sesion extends Conexion{
    public function  __construct() {
        parent::__construct();
    }
    // Metodo para insertar sesion
    public static function insertarSesion($fecha,$hora,$sala,$precio,$pelicula) {
        try {
            $instacia = new Sesion();
            $conexion = $instacia->conexion;
            // Consulta
            $peticion = "INSERT INTO sesionesc(fecha,hora,sala_id,precio,pelicula_id) VALUES(?,?,?,?,?)";
            $stmtInsert = $conexion->prepare($peticion);
            $stmtInsert->bindParam(1, $fecha);
            $stmtInsert->bindParam(2, $hora, PDO::PARAM_INT);
            $stmtInsert->bindParam(3, $sala, PDO::PARAM_INT);
            $stmtInsert->bindParam(4, $precio, PDO::PARAM_INT);
            $stmtInsert->bindParam(5, $pelicula, PDO::PARAM_INT);
            // Ejecutar la consulta
            $stmtInsert->execute();
            $afectado =  $stmtInsert->rowCount();
            $conexion=NULL;
            return $afectado;
        } catch (PDOException $e) {
            // exit("Error: " . $e->getMessage());
        }
    }
}