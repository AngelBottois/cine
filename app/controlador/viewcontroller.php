<?php

class viewcontroller{
    public static function cargarVista($vistaNombre) {
        // Construye la ruta al archivo de la vista
        if($vistaNombre=="admin"){
            $vistaFichero = "admin/html/index.php";
        }else if($vistaNombre=="listadoP"){
            $vistaFichero = "admin/html/listadoP.php";
        }else if($vistaNombre=="listadoA"){
            $vistaFichero = "admin/html/listadoA.php";
        }else if($vistaNombre=="listadoS"){
            $vistaFichero = "admin/html/listadoS.php";
        }else if($vistaNombre=="logout"){
            $vistaFichero = "app/vista/inicio.php";
        }else{
            $vistaFichero = "app/vista/" . $vistaNombre . ".php";
        }
        // Comprueba si el archivo de la vista existe
        if (file_exists($vistaFichero)) {
            // Incluye el archivo de la vista
            include $vistaFichero;
        } else {
            // Maneja el error como prefieras
            echo "Error: la vista '$vistaNombre' no existe.";
        }
    }
}?>