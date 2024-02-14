<?php
class Salacine
{
    public static function getRuta()
    {
        
        //revisad esta ruta, debe contener la ruta a la carpeta imagenes de vuestra apliación
        return 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['SCRIPT_NAME'], 1);
    }
    public static function getRutaP()
    {
        
        //revisad esta ruta, debe contener la ruta a la carpeta imagenes de vuestra apliación
        return 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['SCRIPT_NAME'], 4) . '/utiles/img/back/peliculas/';
    }
    public static function getRutaA()
    {
        
        //revisad esta ruta, debe contener la ruta a la carpeta imagenes de vuestra apliación
        return 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['SCRIPT_NAME'], 4) . '/utiles/img/back/personal';
    }
    // Peliculas
    public static function getPeliculas()
    {
        $rutaP = self::getRutaP();
        $rutaA = self::getRutaA();

        $db = Conectar::conexion();
        $peliculas = [];
        $sql1 = "SELECT peliculasc.id as id_pelicula, peliculasc.nombre as nombre_pelicula, generoc.nombre as genero, CONCAT('$rutaP',peliculasc.cartel)  as caratula, peliculasc.argumento as argumento FROM peliculasc LEFT JOIN generoc ON peliculasc.genero_id=generoc.id";
        $resultado = $db->prepare($sql1);
        $resultado->execute();
        while($pelicula = $resultado->fetch(PDO::FETCH_ASSOC)){
            $peliculas[] = $pelicula;
        }
        $sql2 = "SELECT personalc.id as id_personal, personalc.nombre as nombre_personal, CONCAT('$rutaA',personalc.imagen) as imagen_personal, personalc.tipo as rol_personal FROM personalc LEFT JOIN peliculas_personalc ON personalc.id=peliculas_personalc.personal_id LEFT JOIN peliculasc ON peliculas_personalc.pelicula_id=peliculasc.id WHERE peliculasc.id=?";
        $resultado2 = $db->prepare($sql2);
        foreach ($peliculas as $indice =>$pelicula) {
            $resultado2->bindParam(1,$pelicula['id_pelicula']);
            $resultado2->execute();
            while($personal = $resultado2->fetch(PDO::FETCH_ASSOC)){
                $peliculas[$indice]['elenco'][] = $personal; 
            }
        }
        return $peliculas;
    }
    // Peliculas por id
    public static function getPelicula($id)
    {
        $rutaP = self::getRutaP();
        $rutaA = self::getRutaA();
        $db = Conectar::conexion();
        $pelicula = [];
        $sql1 = "SELECT peliculasc.id as id_pelicula, peliculasc.nombre as nombre_pelicula, generoc.nombre as genero, CONCAT('$rutaP',peliculasc.cartel)  as caratula, peliculasc.argumento as argumento FROM peliculasc LEFT JOIN generoc ON peliculasc.genero_id=generoc.id WHERE peliculasc.id=?";
        $resultado = $db->prepare($sql1);
        $resultado->bindParam(1,$id,PDO::PARAM_INT);
        $resultado->execute();
        $pelicula = $resultado->fetch(PDO::FETCH_ASSOC);
        
        $sql2 = "SELECT personalc.id as id_personal, personalc.nombre as nombre_personal, CONCAT('$rutaA',personalc.imagen), personalc.tipo as rol_personal FROM personalc LEFT JOIN peliculas_personalc ON personalc.id=peliculas_personalc.personal_id LEFT JOIN peliculasc ON peliculas_personalc.pelicula_id=peliculasc.id WHERE peliculasc.id=?";
        $resultado2 = $db->prepare($sql2);
 
            $resultado2->bindParam(1,$pelicula['id_pelicula']);
            $resultado2->execute();
            while($personal = $resultado2->fetch(PDO::FETCH_ASSOC)){
                $pelicula['elenco'][] = $personal; 
            }

        return $pelicula;
    }
    public static function getPeliculaNombre($nombre)
    {
        $rutaP = self::getRutaP();
        $rutaA = self::getRutaA();
        $db = Conectar::conexion();
        $pelicula = [];
        $sql1 = "SELECT peliculasc.id as id_pelicula, peliculasc.nombre as nombre_pelicula, generoc.nombre as genero, CONCAT('$rutaP',peliculasc.cartel)  as caratula FROM peliculasc LEFT JOIN generoc ON peliculasc.genero_id=generoc.id WHERE peliculasc.nombre LIKE :nombre";
        $resultado = $db->prepare($sql1);
        $resultado->bindValue('nombre','%'.$nombre.'%');
        // $resultado->bindParam("nombre",'%'.$nombre.'%');
        $resultado->execute();
        $pelicula = $resultado->fetch(PDO::FETCH_ASSOC);
        $sql2 = "SELECT personalc.id as id_personal, personalc.nombre as nombre_personal, CONCAT('$rutaA',personalc.imagen), personalc.tipo as rol_personal FROM personalc LEFT JOIN peliculas_personalc ON personalc.id=peliculas_personalc.personal_id LEFT JOIN peliculasc ON peliculas_personalc.pelicula_id=peliculasc.id WHERE peliculasc.nombre LIKE :nombre2";
        $resultado2 = $db->prepare($sql2);
        $resultado2->bindValue('nombre2','%'.$nombre.'%');
        // $resultado2->bindParam("nombre",'%'.$pelicula['nombre_pelicula'].'%');
            $resultado2->execute();
            while($personal = $resultado2->fetch(PDO::FETCH_ASSOC)){
                $pelicula['elenco'][] = $personal; 
            }

        return $pelicula;
    }
     // Actores
     public static function getActores()
     {
         $db = Conectar::conexion();
         $actores = [];
         $sql1 = "SELECT personalc.id, personalc.nombre, personalc.tipo, personalc.imagen FROM personalc";
         $resultado = $db->prepare($sql1);
         $resultado->execute();
         while($actor = $resultado->fetch(PDO::FETCH_ASSOC)){
             $actores[] = $actor;
         }
         $sql2 = "SELECT peliculasc.id, peliculasc.nombre, peliculas_personalc.personal_id FROM peliculasc LEFT JOIN peliculas_personalc ON peliculasc.id=peliculas_personalc.pelicula_id LEFT JOIN usuariosc ON usuariosc.id=peliculas_personalc.personal_id;";
         $resultado2 = $db->prepare($sql2);
         $datos = [];
         $resultado2->execute();
         while($dato = $resultado2->fetch(PDO::FETCH_ASSOC)){
            $datos[] = $dato;
         }
        
         foreach($actores as $indice => $actor){
            foreach($datos as $dato){
                if($dato['personal_id'] == $actor['id']){
                    $actores[$indice]['peliculas'][] = $dato['id'];
                    $actores[$indice]['peliculas'][] = $dato['nombre'];
                }
            }
         }
         return $actores;
     }
     // Actores por id
     public static function getActor($id)
     {
        $db = Conectar::conexion();
        $actor = [];
        $sql1 = "SELECT personalc.id, personalc.nombre, personalc.tipo, personalc.imagen FROM personalc WHERE personalc.id=?";
        $resultado = $db->prepare($sql1);
        $resultado->bindParam(1,$id,PDO::PARAM_INT);
        $resultado->execute();
        $actor = $resultado->fetch(PDO::FETCH_ASSOC);

        
        $sql2 = "SELECT peliculasc.id, peliculasc.nombre, peliculas_personalc.personal_id FROM peliculasc LEFT JOIN peliculas_personalc ON peliculasc.id=peliculas_personalc.pelicula_id LEFT JOIN usuariosc ON usuariosc.id=peliculas_personalc.personal_id;";
        $resultado2 = $db->prepare($sql2);
        $datos = [];
        $resultado2->execute();
        while($dato = $resultado2->fetch(PDO::FETCH_ASSOC)){
           $datos[] = $dato;
        }
       
         foreach($datos as $dato){
            if($dato['personal_id'] == $actor['id']){
                $actor['peliculas'][] = $dato['id'];
                $actor['peliculas'][] = $dato['nombre'];
            }
        }

        return $actor;
     }
      // Actores por id
      public static function getActorNombre($nombre)
      {
         $db = Conectar::conexion();
         $actor = [];
         $sql1 = "SELECT personalc.id, personalc.nombre, personalc.imagen FROM personalc WHERE personalc.nombre LIKE :nombre";
         $resultado = $db->prepare($sql1);
         $resultado->bindValue("nombre",'%'.$nombre.'%');
         $resultado->execute();
         $actor = $resultado->fetch(PDO::FETCH_ASSOC);
 
         
         $sql3 = "SELECT personalc.tipo FROM personalc WHERE nombre=?";
         $resultado3 = $db->prepare($sql3);
         $resultado3->bindValue(1,$nombre);
         $resultado3->execute();
         
         while($r = $resultado3->fetch(PDO::FETCH_ASSOC)){
            $rol[] = $r;
         }
         foreach ($rol as $r) {
            foreach($r as $rolI){
                $actor['rol'][] = $rolI;
            }
         }
         $sql2 = "SELECT peliculasc.id, peliculasc.nombre, peliculas_personalc.personal_id FROM peliculasc LEFT JOIN peliculas_personalc ON peliculasc.id=peliculas_personalc.pelicula_id LEFT JOIN usuariosc ON usuariosc.id=peliculas_personalc.personal_id;";
         $resultado2 = $db->prepare($sql2);
         $datos = [];
         $resultado2->execute();
         while($dato = $resultado2->fetch(PDO::FETCH_ASSOC)){
            $datos[] = $dato;
         }
         $pelicula = [];
         $url = self::getRuta();
         foreach($datos as $dato){
             if($dato['personal_id'] == $actor['id']){
                 $pelicula['id_pelicula'] = $dato['id'];
                 $pelicula['nombre_pelicula'] = $dato['nombre'];
                 $pelicula['endpoint'] = $url . "/cine/peliculas/" . $dato['id'];
                 $actor['peliculas'][] = $pelicula;
             }
         }
 
         return $actor;
      }
     // Insertar peliculas
     public static function insertPelicula($data){
        $url = self::getRuta();
        $generos = self::obtenerGeneros();
        $genero_id = null;
        $actores = self::getActores();
        $actores_id = [];
        $personal = explode(",",$data['personal']);
        $correctos = true;
        $nombres = [];
        foreach ($personal as $indice => $persona) {
            foreach ($actores as $actor){
                $indice == 0 ? $nombres[] = $actor['nombre'] : null ;
                if($actor['nombre']==$persona){
                    $actores_id[] = $actor['id'];
                }
            }
            !in_array($persona, $nombres) ? $correctos=false : null ;
        }
        foreach ($generos as $genero) {
            $genero['nombre'] == $data['genero'] ? $genero_id = $genero['id'] : null ;
        }

        if($genero_id!=null && $correctos){
            $db = Conectar::conexion();
            $sql1 = "INSERT INTO peliculasc(nombre,argumento,cartel,clasificacion_edad,genero_id) VALUES (?,?,?,?,?)";
            $resultado = $db->prepare($sql1);
            $resultado->bindParam(1,$data['nombre']);
            $resultado->bindParam(2,$data['argumento']);
            $resultado->bindParam(3,$data['cartel']);
            $resultado->bindParam(4,$data['clasificacion_edad']);
            $resultado->bindParam(5,$genero_id, PDO::PARAM_INT);
            $resultado->execute();
            
            $idPeli=0;
            $idPeli = $db->lastInsertId();

            $sql2 = "INSERT INTO peliculas_personalc(pelicula_id,personal_id) VALUES (?,?)";
            $resultado2 = $db->prepare($sql2);
            foreach ($actores_id as $id) {
                
                $resultado2->bindParam(1,$idPeli,PDO::PARAM_INT);
                $resultado2->bindParam(2,$id,PDO::PARAM_INT);
                $resultado2->execute();
            }
            $datos['id'] = $idPeli;
            $datos['endpoint'] = $url . "/cine/peliculas/" . $idPeli; 

            return $datos;
        }else{
            return false;
        }
     }
     // Insertar actor
     public static function insertActor($data){

     }
     // Obtener los generos
     public static function obtenerGeneros(){
        $db = Conectar::conexion();
        $generos = [];
        $sql = "SELECT id, nombre FROM generoc";
        $resultado = $db->prepare($sql);
        $resultado->execute();
        while($genero = $resultado->fetch(PDO::FETCH_ASSOC)){
            $generos[] = $genero;
        }
        return $generos;
     } 
}
