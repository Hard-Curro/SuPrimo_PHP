<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'outlook.office365.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'pruebasVedruna@outlook.es';
        $mail->Password = 'V3drun@Sevilla';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('pruebasVedruna@outlook.es', $nombre);
        $mail->addAddress('pruebasVedruna@outlook.es');

        $mail->isHTML(true);
        $mail->Subject = 'Mensaje desde el formulario de contacto';
        $mail->Body = "Nombre: $nombre <br> Correo: $email <br> Mensaje: $mensaje";
        $mail->AltBody = "Nombre: $nombre \nCorreo: $email \nMensaje: $mensaje";

        $mail->send();
        echo '<script>window.open("../index.php", "_blank");</script>';
    } catch (Exception $e) {
        echo "El mensaje no pudo ser enviado. Error del correo: {$mail->ErrorInfo}";
    }
} else {
    echo 'Acceso no permitido';
}
?>