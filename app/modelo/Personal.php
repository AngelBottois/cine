<?php
// include_once 'Conexion.php';
class Personal extends Conexion{
    public function  __construct() {
        parent::__construct();
    }
    // Metodo para insertar actor
    public static function insertarPersonal($nombre,$tipo,$foto) {
        try {
            $instacia = new Usuario();
            $conexion = $instacia->conexion;
            // Consulta
            $peticion = "INSERT INTO personalc(nombre,tipo,imagen) VALUES(?,?,?)";
            $stmtInsert = $conexion->prepare($peticion);
            $stmtInsert->bindParam(1, $nombre);
            $stmtInsert->bindParam(2, $tipo);
            $stmtInsert->bindParam(3, $foto);
            // Ejecutar la consulta
            $stmtInsert->execute();
            $conexion=NULL;
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }
    // Metodo para obtener actores
    public static function obtenerActores() {
        try {
            $instacia = new Usuario();
            $conexion = $instacia->conexion;
            $actores = [];
            // Consulta
            $peticion = "SELECT id,nombre,tipo,imagen FROM personalc WHERE tipo LIKE 'Act%'";
            $stmtInsert = $conexion->prepare($peticion);
            // Ejecutar la consulta
            $stmtInsert->execute();
            while($actor = $stmtInsert->fetch(PDO::FETCH_ASSOC)){
                $actores[] = $actor;
            }
            $conexion=NULL;
            return $actores;
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }
    // Metodo para obtener actores
    public static function obtenerActor($nombre) {
        try {
            $instacia = new Usuario();
            $conexion = $instacia->conexion;
            $actor = [];
            // Consulta
            $peticion = "SELECT id,nombre,tipo,imagen FROM personalc WHERE tipo LIKE 'Act%' AND nombre=?";
            $stmtInsert = $conexion->prepare($peticion);
            $stmtInsert->bindParam(1,$nombre);

            // Ejecutar la consulta
            $stmtInsert->execute();
            $actor = $stmtInsert->fetch(PDO::FETCH_ASSOC);

            $conexion=NULL;
            return $actor;
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }
    // Metodo para obtener directores
    public static function obtenerDirectores() {
        try {
            $instacia = new Usuario();
            $conexion = $instacia->conexion;
            $directores = [];
            // Consulta
            $peticion = "SELECT id,nombre,tipo,imagen FROM personalc WHERE tipo LIKE 'Dir%'";
            $stmtInsert = $conexion->prepare($peticion);
            // Ejecutar la consulta
            $stmtInsert->execute();
            while($director = $stmtInsert->fetch(PDO::FETCH_ASSOC)){
                $directores[] = $director;
            }
            $conexion=NULL;
            return $directores;
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }
    // Metodo para obtener director
    public static function obtenerDirector($nombre) {
        try {
            $instacia = new Usuario();
            $conexion = $instacia->conexion;
            $director = [];
            // Consulta
            $peticion = "SELECT id,nombre,tipo,imagen FROM personalc WHERE tipo LIKE 'Dir%' AND nombre=?";
            $stmtInsert = $conexion->prepare($peticion);
            $stmtInsert->bindParam(1,$nombre);
            // Ejecutar la consulta
            $stmtInsert->execute();
            $director = $stmtInsert->fetch(PDO::FETCH_ASSOC);
            $conexion=NULL;
            return $director;
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }
}