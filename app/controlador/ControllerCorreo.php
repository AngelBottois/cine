<?php
//Espacios de nombres
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Cargamos el Composer autoload para poder utilizar las clases
//Poned la ruta correcta a esta carpeta
require 'vendor/autoload.php';
class ControllerCorreo
{
    //Método para enviar un correo
    //Recibe como parámetro la dirección de correo del receptor
    public static function enviarCorreo($receptor)
    {
        //Creamos el contenido del asunto 
        $subject = "Por favor confirma tu correo electronico.";
        //Cuerpo del mensaje
        $message = 'Para confirmar el correo <a href=\'http://143.47.43.204:8080/angel/cine/index.php?ctl=login&activo=true&c=' . $receptor . '\'>pincha aqui.</a><br>Este mensaje fue generado el ' . date("Y-m-d H:i:s");

        try {
            // Creando una nueva instancia de PHPMailer
            $mail = new PHPMailer(true);

            // Indicando el uso de SMTP
            //SMTP –Simple Mail Transfer Protocol, o protocolo simple de transferencia de correo
            //Protocolo básico que permite que los emails viajen a través de internet.
            $mail->isSMTP();

            // Habilitando SMTP debugging
            // 0 = apagado (para producción)
            // 1 = mensajes del cliente
            // 2 = mensajes del cliente y servidor
            $mail->SMTPDebug = 0;

            // Agregando compatibilidad con HTML
            $mail->Debugoutput = 'html';

            // Estableciendo el nombre del servidor de email
            $mail->Host = 'smtp.gmail.com';

            // Estableciendo el puerto
            // Se utilizan los puertos 25 o 587.
            // Gmail utiliza el 587
            $mail->Port = 587;

            // Estableciendo el sistema de encriptación
            $mail->SMTPSecure = 'tls';

            // Para utilizar la autenticación SMTP
            $mail->SMTPAuth = true;

            // Nombre de usuario para la autenticación SMTP - usar dirección de gmail
            $mail->Username = "angel.entorno.cliente@gmail.com";

            // Password para la autenticación SMTP de aplicaciones de GMAIL           
            $mail->Password = "jlre tzyb vhyt fyrm";

            // Estableciendo como quién se va a enviar el mail
            $emisor = 'angel.entorno.cliente@gmail.com';
            $mail->setFrom($emisor);

            //Nombre del emisor que aparece en el mensaje
            $mail->FromName = 'Cine PlayOn';


            // Estableciendo a quién se va a enviar el correo   
            $mail->addAddress($receptor);

            //Establecemos el juego de caracteres 
            //Que se utilizará para enviar el mensaje (tíldes, ñ) 
            $mail->CharSet = 'UTF-8';

            // El asunto del mail
            $mail->Subject = $subject;

            // Estableciendo el mensaje a enviar
            // Cuerpo del mensaje es HTML
            $mail->MsgHTML($message);


            // Adjuntando unos archivos si fuese necesario, hay que colocar la ruta completa al archivo
            //$mail->addAttachment('imagenes/mafalda.png');


            //Esta instrucción envía el mensaje
            //antes debemos establecer todas las condiciones
            $mail->Timeout = 7;

            //El método send devuelve true si el mensaje se ha podido enviar y false en caso contrario
            $mail->send();
        } catch (Exception $e) {
            echo "En la línea "  . $e->getLine() . ' en el archivo ' . $e->getFile() . ': <br>';
            echo "<br>Mensaje de error:" . $e->getMessage();
        }
    }
}
