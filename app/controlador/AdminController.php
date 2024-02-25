<?php
// include_once "./app/modelo/Pelicula.php";
class AdminController{
    // Cerrar sesion
    public static function cerrarSesion(){
        $_SESSION = [];
        setcookie(session_name(), '', time()-3600);
        session_destroy();
    }
    // Obtener datos de peliculas
    public static function obtenerPeliculas(){
        $_SESSION['admin']['peliculas'] = Pelicula::obtenerPeliculas();
    }
    // Obtener datos de actores
    public static function obtenerActores(){
        $_SESSION['admin']['actores'] = Personal::obtenerActores();
    }
    // Añadir actor
    public static function addActor(){
        $correcto = false;
        if(isset($_REQUEST['nombre']) && isset($_FILES['foto'])){
            $nombre = self::estandarizar($_REQUEST['nombre']);
            if(self::imagenCorrecta($_FILES['foto'])){
                Personal::insertarPersonal($nombre,$_REQUEST['tipo'],$_FILES['foto']['name']);
                $correcto = true;
            }else{
                $_SESSION['error'] = "Imagen no valida";
            }
        }
        return $correcto;
    }
    // Añadir pelicula
    public static function addPelicula(){
        $correcto = false;
        if(isset($_REQUEST['nombre'])){
            $nombre = self::estandarizar($_REQUEST['nombre']);
            $argumento = self::estandarizar($_REQUEST['argumento']);
            $edad = self::estandarizar($_REQUEST['edad']);

            if(strlen($argumento)<300){
                if(self::imagenCorrecta($_FILES['cartel'])){
                    Pelicula::insertarPelicula($nombre,$argumento,$edad,$_REQUEST['generos'], $_REQUEST['actor'], $_REQUEST['director'],$_FILES['cartel']['name']) ? $_SESSION['error'] = "Pelicula insertada correctamente" : $_SESSION['error'] = "Actor o Director erroneos";
                }else{
                    $_SESSION['error'] = "Error en los campos, reviselos";
                }
            }
        }
        return $correcto;
    }
    // Añadir sesion
    public static function addSesion(){
        $correcto = false;
        if(isset($_REQUEST['fecha'])){
            if($_REQUEST['fecha']!=''){
                $precio = floatval($_REQUEST['precio']);
                if($precio>0){
                    Sesion::insertarSesion($_REQUEST['fecha'],$_REQUEST['hora'],$_REQUEST['sala'],$_REQUEST['precio'],$_REQUEST['pelicula']) ? $_SESSION['error'] = 'Pelicula agregada correctamente' : $_SESSION['error'] = 'Error, pelicula no existente';
                }else{
                    $_SESSION['error'] = 'El precio no puede ser negativo';
                }
            }else{
                $_SESSION['error'] = 'Fecha incorrecta';
            }
        }
        return $correcto;
    }
    // Obtener datos de directores
    public static function obtenerDirectores(){
        $_SESSION['admin']['directores'] = Personal::obtenerDirectores();
    }
    // Metodo para eliminar caracteres no deseados
    public static function estandarizar($dato){
        $dato = trim($dato); // Elimina espacios antes y después de los datos
        $dato = strip_tags($dato); //Retira las etiquetas HTML y PHP de un string
        $dato = stripslashes($dato); // Elimina backslashes \
        $dato = htmlspecialchars($dato); //Traduce caracteres especiales en entidades HTML
        return $dato;
    }
    // Metodo para comprobar que la imagen es correcta
    public static function imagenCorrecta($imagen) {
        $correcta = true;
        $directorioDestino = "utiles/img/back/personal/";
        $extension = strtolower(pathinfo($imagen["name"], PATHINFO_EXTENSION));
        $nombre = strtolower(pathinfo($imagen["name"], PATHINFO_FILENAME));

        // Comprobar si el archivo es una imagen
        if($imagen["tmp_name"]!=""){
            $esImagen = in_array(mime_content_type($imagen["tmp_name"]), array("image/jpg", "image/jpeg", "image/png", "image/gif"));
            if ($esImagen === false) {
                $correcta = false;
                // Comprobar el tamaño del archivo
            } elseif ($imagen["size"] > 1000000) {
                $correcta = false;
                // Permitir ciertos formatos de archivo
            } elseif ($extension != "jpg" && $extension != "png" && $extension != "jpeg" && $extension != "gif") {
                $correcta = false;
            }
             // Intentar mover el archivo subido al directorio destino
            if ($correcta) {
                $nombreImagen =  $nombre . "." . $extension;
                $rutaArchivo = $directorioDestino . $nombreImagen;
                $resultado = move_uploaded_file($imagen["tmp_name"], $rutaArchivo);
                if ($resultado === false) {
                    $nombreImagen = NULL;
                    $correcta = false;
                }
            }
        }else{
            $correcta = false;
        }
        return $correcta;
    }
    // Obtener generos de peliculas
    public static function obtenerGeneros(){
        $_SESSION['admin']['generos'] = Pelicula::obtenerGeneros();
    }
    // Obtener generos de peliculas
    public static function obtenerPelicula(){
        $_SESSION['admin']['pelicula'] = Pelicula::obtenerPelicula($_REQUEST['p']);
    }
    // Obtener las sesiones de una pelicula
    public static function obtenerSesiones(){
        $_SESSION['admin']['pelicula']['sesiones'] = Pelicula::obtenerFechaSesiones($_REQUEST['p']);
    }
    // Obtener las sesiones de una pelicula
    public static function obtenerSesion(){
        $_SESSION['sesion'] = Pelicula::obtenerSesion($_REQUEST['s']);
    }
    // Obtener las salas de una sesion
    public static function obtenerSalas(){
        $_SESSION['sala'] = Pelicula::obtenerSala($_REQUEST['s'],$_POST['sesiones']);
    }
    // Obtener las salas de una sesion
    public static function obtenerSesionesTotales(){
        $_SESSION['admin']['sesiones'] = Pelicula::obtenerSesionesTotales();
    }
}?>