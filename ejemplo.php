<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
 
$mail = new PHPMailer(true);
try {
    $mail->SMTPDebug = 2;  // Sacar esta línea para no mostrar salida debug
    $mail->isSMTP();
    $mail->Host = 'mail.midominio.com';  // Host de conexión SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'remitente@midominio.com';                 // Usuario SMTP
    $mail->Password = 'MiPa33W0rD';                           // Password SMTP
    $mail->SMTPSecure = 'tls';                            // Activar seguridad TLS
    $mail->Port = 587;                                    // Puerto SMTP
 
    $mail->setFrom('remitente@midominio.com');		// Mail del remitente
    $mail->addAddress('destinatario@gmail.com');     // Mail del destinatario
 
    $mail->isHTML(true);
    $mail->Subject = 'Contacto desde formulario';  // Asunto del mensaje
    $mail->Body    = 'Este es el contenido del mensaje <b>en negrita!</b>';    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
 
    $mail->send();
    echo 'El mensaje ha sido enviado';
} catch (Exception $e) {
    echo 'El mensaje no se ha podido enviar, error: ', $mail->ErrorInfo;
}
