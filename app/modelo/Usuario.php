<?php
// include_once 'Conexion.php';
class Usuario extends Conexion{
    public function  __construct() {
        parent::__construct();
    }
    // Metodo para insertar usuario
    public static function insertarUsuario($nombre,$apellidos,$email,$nif,$hash) {
        try {
            $instacia = new Usuario();
            $conexion = $instacia->conexion;
            // Consulta
            $peticion = "INSERT INTO usuariosc(correo,nombre,apellidos,nif,activo,avatar,hash_pass,rol) VALUES(?,?,?,?,false,'defaut.jpg',?,'cliente')";
            $stmtInsert = $conexion->prepare($peticion);
            $stmtInsert->bindParam(1, $email);
            $stmtInsert->bindParam(2, $nombre);
            $stmtInsert->bindParam(3, $apellidos);
            $stmtInsert->bindParam(4, $nif);
            $stmtInsert->bindParam(5, $hash);
            // Ejecutar la consulta
            $stmtInsert->execute();
            $conexion=NULL;
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }
    // Metodo para obtener usuario
    public static function obtenerUsuario($email) {
        try {
            $instacia = new Usuario();
            $conexion = $instacia->conexion;
            $usuario = [];
            // Consulta
            $peticion = "SELECT id,correo,nombre,apellidos,NIF,activo,avatar,hash_pass,rol from usuariosc WHERE correo=?";
            $stmtInsert = $conexion->prepare($peticion);
            $stmtInsert->bindParam(1, $email);
            // Ejecutar la consulta
            $stmtInsert->execute();
            $usuario = $stmtInsert->fetch(PDO::FETCH_ASSOC);
            $conexion=NULL;
            return $usuario;
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }
    // Metodo para obtener lista emails
    public static function obtenerEmails() {
        try {
            $instacia = new Usuario();
            $conexion = $instacia->conexion;
            $emails = [];
            // Consulta
            $peticion = "SELECT correo from usuariosc";
            $stmtInsert = $conexion->prepare($peticion);
            // Ejecutar la consulta
            $stmtInsert->execute();
            while($email = $stmtInsert->fetch(PDO::FETCH_COLUMN)){
                $emails[] = $email;
            }
            $conexion=NULL;
            return $emails;
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }
    // Metodo para obtener lista NIF
    public static function obtenerNIFS() {
        try {
            $instacia = new Usuario();
            $conexion = $instacia->conexion;
            $nifs = [];
            // Consulta
            $peticion = "SELECT nif from usuariosc";
            $stmtInsert = $conexion->prepare($peticion);
            // Ejecutar la consulta
            $stmtInsert->execute();
            while($nif = $stmtInsert->fetch(PDO::FETCH_DEFAULT)){
                $emails[] = $nifs;
            }
            $conexion=NULL;
            return $nifs;
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }
    // Metodo para cambiar el activo
    public static function activar($email) {
        try {
            $instacia = new Usuario();
            $conexion = $instacia->conexion;
            // Consulta
            $peticion = "UPDATE usuariosc SET activo=true WHERE correo=?";
            $stmtInsert = $conexion->prepare($peticion);
            $stmtInsert->bindParam(1, $email);
            // Ejecutar la consulta
            $stmtInsert->execute();
            $conexion=NULL;
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }
}