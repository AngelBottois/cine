<?php
// include_once "./app/modelo/Usuario.php";
class formulariocontroller{
    // Insertar datos en la bd
    public static function insertar(){
        $insertado = false;
        if(isset($_REQUEST['nombre']) && isset($_REQUEST['apellidos'])){
            if($_REQUEST['nombre']!='' && $_REQUEST['apellidos']!=''){
                $nombre = self::estandarizar($_REQUEST['nombre']);
                $apellidos = self::estandarizar($_REQUEST['apellidos']);
                $_SESSION['resguardo']['nombre'] = $nombre;
                $_SESSION['resguardo']['apellidos'] = $apellidos;
                $listaNIFS[] = Usuario::obtenerNIFS();
                $listaEmails[] = Usuario::obtenerEmails();
                if(self::comprobarEmail($_REQUEST['mail']) && !in_array($_REQUEST['mail'],$listaEmails)){
                    $_SESSION['resguardo']['email'] = $_REQUEST['mail'];
                    if(self::comprobarNIF($_REQUEST['nif']) && !in_array($_REQUEST['nif'],$listaNIFS)){
                        $_SESSION['resguardo']['nif'] = $_REQUEST['nif'];
                        if(isset($_REQUEST['terminos']) && $_REQUEST['terminos']=='on'){
                            if($_REQUEST['pass']!=""){
                                $pass = password_hash($_REQUEST['pass'], PASSWORD_DEFAULT);
                                ControllerCorreo::enviarCorreo($_REQUEST['mail']);
                                Usuario::insertarUsuario($nombre,$apellidos,$_REQUEST['mail'],$_REQUEST['nif'],$pass);
                                $insertado = true;
                            }else{
                                $_SESSION['error'] = "La contraseña no puede estar vacia";
                            }
                        }else{
                            $_SESSION['error'] = "Debes aceptar las políticas de privacidad";
                        }
                    }else{
                        $_SESSION['error'] = "NIF no valido o ya existente";
                    }
                }else{
                    $_SESSION['error'] = "Email no valido o ya existente";
                }
            }else{
                $_SESSION['error'] = "Nombre o apellidos no validos";
            }
        }
        return $insertado;
    }
    // Obtener datos para iniciar sesion
    public static function obtener(){
        if(isset($_REQUEST['activo'])){
            $_REQUEST['activo'] ? Usuario::activar($_REQUEST['c']): null;
        }
        $correcto[0] = false;
        $correcto[1] = "";
        if(isset($_POST['mail']) && isset($_POST['pass'])){
            $listaEmails = Usuario::obtenerEmails();
            if(self::comprobarEmail($_REQUEST['mail']) && in_array($_REQUEST['mail'],$listaEmails)){
                $_SESSION['resguardo']['email'] = $_REQUEST['mail'];
                $usuario = Usuario::obtenerUsuario($_REQUEST['mail']);
                $_SESSION['usuario']['nombre'] = $usuario['nombre'];
                $_SESSION['usuario']['avatar'] = $usuario['avatar'];
                if($usuario['activo'] == true){
                    if(password_verify($_POST['pass'],$usuario['hash_pass'])){
                        $correcto[0] = true;
                        $correcto[1] = $usuario['rol'];
                        $_SESSION['usuario']['email'] = $_POST['mail'];
                        $_SESSION['currentUser']['email'] = $_POST['mail'];
                        $_SESSION['loggeado'] = true;
                    }else{
                        $_SESSION['error'] = "Contraseña incorrecta";
                    }
                }else{
                    $_SESSION['error'] = "Debes confirmar el correo";
                }
            }else{
                $_SESSION['resguardo']['email'] = "Email no valido";
            }
        }
        return $correcto;
    }
    // Metodo para comprobar el email
    public static function comprobarEmail($email){
        $correcto=false;
        $email=self::estandarizar($email);
        if(preg_match('/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/', $email) ){
            $correcto=true;
        }
        return $correcto;
    }
    // Metodo para comprobar la repeticion de contraseñas
    public static function contraRepe($contra, $contrarepe){
        $iguales=false;
        $contra = self::estandarizar($contra);
        $contrarepe = self::estandarizar($contrarepe);
        if($contra==$contrarepe){
            $iguales=true;
        }
        return $iguales;
    }
    // Metodo para comprobar el NIF
    public static function comprobarNIF($nif){
        $correcto = false;
        if(preg_match('/^\d{8}[a-zA-Z]$/', $nif)){
            $correcto = true;
        }
        return $correcto;
    }
    // Metodo para eliminar caracteres no deseados
    public static function estandarizar($dato){
        $dato = trim($dato); // Elimina espacios antes y después de los datos
        $dato = strip_tags($dato); //Retira las etiquetas HTML y PHP de un string
        $dato = stripslashes($dato); // Elimina backslashes \
        $dato = htmlspecialchars($dato); //Traduce caracteres especiales en entidades HTML
        return $dato;
    }

}?>