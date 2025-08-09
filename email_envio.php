<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './phpmailer/src/Exception.php';
require './phpmailer/src/PHPMailer.php';
require './phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = $_POST["email"];

    // Configura la conexión SMTP
    $mail = new PHPMailer(true);
    try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->Username = ''; // Correo completo
            $mail->Password = '';

        // Configura el remitente y el destinatario
        $mail->setFrom('', 'Sistema de Cursos');
        $mail->addAddress($to);

        // Asunto y cuerpo del correo
        $mail->Subject = 'Bienvenido/a';
        $mail->Body    = '¡Gracias por registrarte! Bienvenido/a a nuestro sitio.';

        // Envía el correo
        $mail->send();

        // Redirecciona o muestra un mensaje de éxito
        echo ("ENVIADO");
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}
?>
