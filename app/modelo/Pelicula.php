<?php
// include_once 'Conexion.php';
class Pelicula extends Conexion{
    public function  __construct() {
        parent::__construct();
    }
    // Metodo para obtener peliculas
    public static function obtenerPeliculas() {
        try {
            $instacia = new Pelicula();
            $conexion = $instacia->conexion;
            $peliculas = [];
            // Consulta
            $peticion = "SELECT id,nombre,argumento,cartel,clasificacion_edad,genero_id from peliculasc";
            $stmtInsert = $conexion->prepare($peticion);
            // Ejecutar la consulta
            $stmtInsert->execute();
            while($pelicula = $stmtInsert->fetch(PDO::FETCH_ASSOC)){
                $peliculas[] = $pelicula;
            }
            $conexion=NULL;
            return $peliculas;
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }
    // Metodo para obtener pelicula
    public static function obtenerPelicula($id) {
        try {
            $instacia = new Pelicula();
            $conexion = $instacia->conexion;
            // Consulta
            $peticion = "SELECT id,nombre,argumento,cartel,clasificacion_edad,genero_id from peliculasc WHERE id=?";
            $stmtInsert = $conexion->prepare($peticion);
            $stmtInsert->bindParam(1, $id, PDO::PARAM_INT);
            // Ejecutar la consulta
            $stmtInsert->execute();
            $pelicula = $stmtInsert->fetch(PDO::FETCH_ASSOC);
            $conexion=NULL;
            return $pelicula;
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }
    // Metodo para obtener sesiones en funcion de pelicula
    public static function obtenerFechaSesiones($idPeli) {
        try {
            $instacia = new Pelicula();
            $conexion = $instacia->conexion;
            $sesiones = [];
            // Consulta
            $peticion = "SELECT DISTINCT sesionesc.id, sesionesc.fecha, sesionesc.pelicula_id FROM sesionesc LEFT JOIN peliculasc ON sesionesc.pelicula_id=peliculasc.id WHERE pelicula_id=?";
            $stmtInsert = $conexion->prepare($peticion);
            $stmtInsert->bindParam(1, $idPeli, PDO::PARAM_INT);
            // Ejecutar la consulta
            $stmtInsert->execute();
            while($sesion = $stmtInsert->fetch(PDO::FETCH_ASSOC)){
                $sesiones[] = $sesion;
            }
            $conexion=NULL;
            return $sesiones;
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }
    // Metodo para obtener sesion en funcion de pelicula
    public static function obtenerSesion($idPeli) {
        try {
            $instacia = new Pelicula();
            $conexion = $instacia->conexion;
            $sesiones = [];
            // Consulta
            $peticion = "SELECT sesionesc.id, sesionesc.fecha, horasc.hora, sesionesc.sala_id, sesionesc.precio, sesionesc.pelicula_id FROM sesionesc LEFT JOIN peliculasc ON sesionesc.pelicula_id=peliculasc.id LEFT JOIN horasc ON sesionesc.hora=horasc.id WHERE pelicula_id=?";
            $stmtInsert = $conexion->prepare($peticion);
            $stmtInsert->bindParam(1, $idPeli, PDO::PARAM_INT);
            // Ejecutar la consulta
            $stmtInsert->execute();
            while($sesion = $stmtInsert->fetch(PDO::FETCH_ASSOC)){
                $sesiones[] = $sesion;
            }
            $conexion=NULL;
            return $sesiones;
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }
    // Metodo para obtener la sala en funcion de la sesion
    public static function obtenerSala($idPeli,$fecha) {
        try {
            $instacia = new Pelicula();
            $conexion = $instacia->conexion;
            $salas = [];
            // Consulta
            $peticion = "SELECT sesionesc.fecha, sesionesc.pelicula_id, salasc.nombre FROM sesionesc LEFT JOIN salasc ON salasc.id=sesionesc.sala_id WHERE sesionesc.pelicula_id=? AND sesionesc.fecha=? GROUP BY salasc.nombre";
            $stmtInsert = $conexion->prepare($peticion);
            $stmtInsert->bindParam(1, $idPeli, PDO::PARAM_INT);
            $stmtInsert->bindParam(2, $fecha);
            // Ejecutar la consulta
            $stmtInsert->execute();
            while($sala = $stmtInsert->fetch(PDO::FETCH_ASSOC)){
                $salas[] = $sala;
            }
            $conexion=NULL;
            return $salas;
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }
    // Metodo para insertar pelicula
    public static function insertarPelicula($titulo,$argumento,$clasificacion_edad,$genero_id,$actor,$director,$cartel) {
        try {
            $instacia = new Pelicula();
            $conexion = $instacia->conexion;
            $conexion->beginTransaction();
            $correctos=false;
            // Consulta
            $peticion1 = "INSERT INTO peliculasc(nombre,argumento,cartel,clasificacion_edad,genero_id) VALUES(?,?,?,?,?)";
            $stmtInsert1 = $conexion->prepare($peticion1);
            $stmtInsert1->bindParam(1, $titulo);
            $stmtInsert1->bindParam(2, $argumento);
            $stmtInsert1->bindParam(3, $cartel);
            $stmtInsert1->bindParam(4, $clasificacion_edad);
            $stmtInsert1->bindParam(5, $genero_id, PDO::PARAM_INT);
            // Ejecutar la consulta
            $stmtInsert1->execute();
            $id = $conexion->lastInsertId();

            // Comprobacion de personal
            $compA = Personal::obtenerActor($actor);
            $compD = Personal::obtenerDirector($director);
            if(isset($compA['id']) && isset($compD['id'])){
                $correctos = true;
            }
            if($correctos){
                $peticion2 = "INSERT INTO peliculas_personalc(pelicula_id, personal_id) VALUES (?,?);";
                $peticion3 = "INSERT INTO peliculas_personalc(pelicula_id, personal_id) VALUES (?,?);";
                $stmtInsert2 = $conexion->prepare($peticion2);
                $stmtInsert3 = $conexion->prepare($peticion3);
                $stmtInsert2->bindParam(1, $id, PDO::PARAM_INT);
                $stmtInsert2->bindParam(2, $compA['id'], PDO::PARAM_INT);
                $stmtInsert2->execute();
                $stmtInsert3->bindParam(1, $id, PDO::PARAM_INT);
                $stmtInsert3->bindParam(2, $compD['id'], PDO::PARAM_INT);
                $stmtInsert3->execute();
                $conexion->commit();
                $d=true;
            }else{
                $conexion->rollBack();
                $d=false;
            }
            return $d;
        } catch (PDOException $e) {
            $conexion->rollBack();
            exit("Error: " . $e->getMessage());
        }finally{
            $conexion=NULL;
        }
    }
    // Metodo para obtener genero
    public static function obtenerGeneros() {
        try {
            $instacia = new Pelicula();
            $conexion = $instacia->conexion;
            $generos = [];
            // Consulta
            $peticion = "SELECT id,nombre from generoc";
            $stmtInsert = $conexion->prepare($peticion);
            // Ejecutar la consulta
            $stmtInsert->execute();
            while($genero = $stmtInsert->fetch(PDO::FETCH_ASSOC)){
                $generos[] = $genero;
            }
            $conexion=NULL;
            return $generos;
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }
    // Metodo para obtener listado de sesiones
    public static function obtenerSesionesTotales() {
        try {
            $instacia = new Pelicula();
            $conexion = $instacia->conexion;
            $sesiones = [];
            // Consulta
            $peticion = "SELECT sesionesc.fecha, horasc.hora, salasc.nombre AS nombreSala, sesionesc.precio, peliculasc.nombre AS nombrePelicula FROM sesionesc LEFT JOIN horasc ON sesionesc.hora=horasc.id LEFT JOIN salasc ON salasc.id=sesionesc.sala_id LEFT JOIN peliculasc ON peliculasc.id=sesionesc.pelicula_id";
            $stmtInsert = $conexion->prepare($peticion);
            // Ejecutar la consulta
            $stmtInsert->execute();
            while($sesion = $stmtInsert->fetch(PDO::FETCH_ASSOC)){
                $sesiones[] = $sesion;
            }
            $conexion=NULL;
            return $sesiones;
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }
}