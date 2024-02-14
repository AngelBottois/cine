<?php
class Mostrar
{
    public static function getRuta()
    {
        //revisad esta ruta, debe ser la correcta para vuestra aplicacición
        return 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['SCRIPT_NAME']) . '/imgs/';
    }
    public static function gestion()
    {
        if (!isset($_SERVER['PATH_INFO'])) {
            $mensaje = ["error" => "Endpoint no especificado"];
            $error = "400 Bad Request";
            self::enviarRespuesta(NULL, $error, $mensaje);
        } else {
            $rutaPathSinBarra = explode('/', $_SERVER['PATH_INFO']);
            $recurso = $rutaPathSinBarra[1];
            $id = ($_GET['buscar'] ?? (isset($rutaPathSinBarra[2]) ? $rutaPathSinBarra[2] : null));
            switch ($recurso) {
                case 'peliculas':
                    if ($id) {
                        is_numeric($id) ? self::getPelicula($id) : self::getPeliculaNombre($id);
                    } else {
                        self::getPeliculas();
                    }
                    break;
                case 'actores':
                    if ($id) {
                        is_numeric($id) ? self::getActor($id) : self::getActorNombre($id);
                    } else {
                        self::getActores();
                    }
                    break;
                case 'sesiones':
                    $dia = isset($_GET['dia']) ? $_GET['dia'] : null;
                    self::getSesiones($dia);
                    break;
                default:
                    $mensaje = ["error" => "Endpoint no especificado"];
                    $error = "400 Bad Request";
                    self::enviarRespuesta(NULL, $error, $mensaje);
                    break;
            }
        }
    }

    // Metodo para obtener todas las peliculas
    private static function getPeliculas(){
        $datosConsulta = [];
        $datosConsulta = Salacine::getPeliculas();

        self::enviarRespuesta($datosConsulta);
    }

    // Metodo para obtener una pelicula
    private static function getPelicula($id){
        $datosConsulta = [];
        $datosConsulta = Salacine::getPelicula($id);

        self::enviarRespuesta($datosConsulta);
    }

    // Metodo para obtener una pelicula
    private static function getPeliculaNombre($nombre){
        $datosConsulta = [];
        $datosConsulta = Salacine::getPeliculaNombre($nombre);

        self::enviarRespuesta($datosConsulta);
    }

    // Metodo para obtener todas los actores
    private static function getActores(){
        $datosConsulta = [];
        $datosConsulta = Salacine::getActores();

        self::enviarRespuesta($datosConsulta);
    }

    // Metodo para obtener un actor
    private static function getActor($id){
        $datosConsulta = [];
        $datosConsulta = Salacine::getActor($id);

        self::enviarRespuesta($datosConsulta);
    }

    // Metodo para obtener un actor
    private static function getActorNombre($nombre){
        $datosConsulta = [];
        $datosConsulta = Salacine::getActorNombre($nombre);

        self::enviarRespuesta($datosConsulta);
    }

    // Metodo para obtener todas las sesiones
    private static function getSesiones(){
        
    }

    private static function enviarRespuesta($datosConsulta = NULL, $error = NULL, $mensaje = NULL)
    {
        if ($datosConsulta) {
            $codificado = json_encode(
                $datosConsulta,
                JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
            );
            header("HTTP/1.1 200 OK");
            echo $codificado;
        } else {
            header("HTTP/1.1 $error");
            echo json_encode($mensaje, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
    }
    
}
