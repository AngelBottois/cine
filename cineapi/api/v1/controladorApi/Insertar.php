<?php

/*  Respuesta al cliente:
        1. 200 : OK → La solicitud ha tenido éxito
                header("HTTP/1.0 200 OK");
        2. 201 : Created → La solicitud ha tenido éxito y se ha creado un nuevo recurso  
                header("HTTP/1.0 201 Created");
        3. 204 : No Content → La petición se ha completado con éxito, pero su respuesta no tiene ningún contenido  
                header("HTTP/1.0 204 No Content");
        4. 400 : Bad Request → La solicitud contiene sintaxis errónea 
                header("HTTP/1.0 400 Bad Request");
        5. 404 : Not Found → El servidor no pudo encontrar el contenido solicitado  
                header("HTTP/1.0 404 Not Found");       
        6. 500 : Internal Server Error → Se ha producido un error interno
                 header("HTTP/1.0 500 Internal Server Error");
   */
class Insertar
{
        public static function getRuta()
        {
            //revisad esta ruta, debe ser la correcta para vuestra aplicacición
            return 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['SCRIPT_NAME']) . '/imgs/';
        }
        
        public static function gestion()
        {
                $data = json_decode(file_get_contents("php://input"), true);

                if (!isset($_SERVER['PATH_INFO'])) {
                        $mensaje = ["error" => "Endpoint no especificado"];
                        $error = "400 Bad Request";
                        self::enviarRespuesta(NULL, $error, $mensaje);
                    } else {
                        $rutaPathSinBarra = explode('/', $_SERVER['PATH_INFO']);
                        $recurso = $rutaPathSinBarra[1];
                        // $id = ($_GET['buscar'] ?? (isset($rutaPathSinBarra[2]) ? $rutaPathSinBarra[2] : null));
                        switch ($recurso) {
                            case 'actores':
                                self::insertActor($data);
                                break;
                            case 'peliculas':
                                self::insertPelicula($data);
                                break;
                            default:
                                $mensaje = ["error" => "Endpoint no especificado"];
                                $error = "400 Bad Request";
                                self::enviarRespuesta(NULL, $error, $mensaje);
                                break;
                        }
                    }
       

        }

        // Insertar actores
        private static function insertActor($data){
                $datosConsulta = [];
                $datosConsulta = Salacine::insertActor($data);

                self::enviarRespuesta($datosConsulta);
        }

        // Insertar actores
        private static function insertPelicula($data){
                $datosConsulta = [];
                $datosConsulta = Salacine::insertPelicula($data);

                self::enviarRespuesta($datosConsulta);
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
