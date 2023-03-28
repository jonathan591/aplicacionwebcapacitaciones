
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';




 
$mail = new PHPMailer(true);
try {
    $mail->SMTPDebug = 0;  // Sacar esta línea para no mostrar salida debug
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Host de conexión SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'puntoencuentrolaurel@gmail.com';                 // Usuario SMTP
    $mail->Password = 'zrahftbidrztazwz';                           // Password SMTP
    $mail->SMTPSecure = 'tls';                            // Activar seguridad TLS
    $mail->Port = 587;                                    // Puerto SMTP

    #$mail->SMTPOptions = ['ssl'=> ['allow_self_signed' => true]];  // Descomentar si el servidor SMTP tiene un certificado autofirmado
    #$mail->SMTPSecure = false;				// Descomentar si se requiere desactivar cifrado (se suele usar en conjunto con la siguiente línea)
    #$mail->SMTPAutoTLS = false;			// Descomentar si se requiere desactivar completamente TLS (sin cifrado)
 
    $mail->setFrom('puntoencuentrolaurel@gmail.com');		// Mail del remitente
    $mail->addAddress($correo);     // Mail del destinatario
    $fecha=date('y-m-d');
    $mail->isHTML(true);
    $mail->Subject = 'BIENVENIDOS AL PUNTO ENCUENTRO LAUREL';  // Asunto del mensaje
    $mail->Body    = "
    <html>
    <head>
      <title>fecha:$fechaRegistro </title>
      
    </head>
    <body style='background: rgb(68 221 223);
    background: linear-gradient(135deg, rgb(56 204 206) 23%, rgb(98 156 232) 100%);'>
    <form  style='text-align: center;
    padding: 15px 40px;
    border-radius: 10px 10px 0 0;' >
    <h4 style='color: blue; font-size:20px;
   
    font-weight:bold;
    font-style:arial;
    line-height:30px;
    letter-spacing:5px;
   
    text-transform:capitalize;
    text-align:center;
    text-indent:30px;'>SU SESSION SE INICIO EXISTOSAMENTE  </h4>
    <h4 style='font-weight:bold;
    font-style:arial;
    line-height:30px;
    letter-spacing:5px;'> fecha:$fechaRegistro </h4>
    <table border='1'  HEIGHT=25% WIDTH='30%' align='center' >
        <thead >
        <tr style='font-weight:bold;
        font-style:arial;
        line-height:30px;
        letter-spacing:5px;'>
                  <th colspan='2' style='text-align: center;'>Detalles</th>
              </tr>
      <tr >
        <th style='font-weight:bold;
        font-style:arial;
        line-height:30px;
        letter-spacing:5px;'>Nombre</th>
        <td>$NombresUsuario </td>
        </tr>
        <tr>
        <th style='font-weight:bold;
        font-style:arial;
        line-height:30px;
        letter-spacing:5px;'>Ip</th>
        <td>$ipusuario</td>
        </tr>
        <tr>
        <th style='font-weight:bold;
        font-style:arial;
        line-height:30px;
        letter-spacing:5px;'>dispositivo</th>
        <td>$dispositivo</td>
        </tr>
        <tr>
        <th style='font-weight:bold;
        font-style:arial;
        line-height:30px;
        letter-spacing:5px;'>sistema</th>
        <td>$sitema</td>
        </tr>
     
      </thead>
      
    </table>
    </form>
    </body>
    </html>";    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
 
    $mail->send();
//   echo 'El mensaje ha sido enviado';
    ?>
<script>
    console.log("se envio el mensaje");
</script>
<?php
} catch (Exception $e) {
//     echo 'El mensaje no se ha podido enviar, error: ', $mail->ErrorInfo; 
?>
<script>
    console.log("El mensaje no se ha podido enviar");
</script>
 <?php 
}
?>
