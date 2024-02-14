<?php
// include_once "./app/controlador/viewcontroller.php";
// include_once "./app/controlador/formulariocontroller.php";
// include_once "./app/controlador/admincontroller.php";

session_set_cookie_params(0, '');
session_start();
// Permanencia de campos correctos en los formularios
$iniciado = $_SESSION['loggeado'] ?? false;
$iniciado == true ? $_SESSION['dir'] = "inicio" : $_SESSION['dir'] = "login" ;
$_SESSION['resguardo'] = [];
$_SESSION['resguardo']['nombre'] = "";
$_SESSION['resguardo']['apellidos'] = "";
$_SESSION['resguardo']['email'] = "";
$_SESSION['resguardo']['nif'] = "";
$_SESSION['error'] = "";
$accion = $_REQUEST['ctl'] ?? 'inicio';
// Direccionamiento a metodos
switch($accion){
    case 'logout':
        AdminController::cerrarSesion();
        $_SESSION['dir'] = "login";
        break;
    case 'register':
        formulariocontroller::insertar() ? $accion = "cerrar": null;
        break;
    case 'login':
        $loggeado = formulariocontroller::obtener();
        if($loggeado[0]){
            $loggeado[1] == "cliente" ? $accion = "inicio" : $accion = "admin";
        }
        break;
    case 'listadoP':
        AdminController::obtenerPeliculas();
        AdminController::obtenerActores();
        AdminController::obtenerDirectores();
        AdminController::obtenerGeneros();
        break;
    case 'buscador':
        AdminController::obtenerPeliculas();
        AdminController::obtenerGeneros();
        break;
    case 'listadoA':
        AdminController::obtenerActores();
        AdminController::obtenerDirectores();
        break;
    case 'listadoS':
        AdminController::obtenerSesionesTotales();
        AdminController::obtenerPeliculas();
        break;
    case 'addActor':
        AdminController::addActor() ? $accion = "listadoA" : null;
        break;
    case 'addPelicula':
        AdminController::addPelicula();
        break;
    case 'addSesion':
        AdminController::addSesion();
        break;
    case 'pelicula':
        AdminController::obtenerPelicula();
        AdminController::obtenerSesiones();
        break;
    case 'sesion':
        AdminController::obtenerSesion();
        AdminController::obtenerSalas();
        break;
}
// Controlador de vistas
viewcontroller::cargarVista($accion);
?>