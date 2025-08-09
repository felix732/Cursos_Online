<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Incluye los archivos necesarios de PHPMailer
require './phpmailer/src/Exception.php';
require './phpmailer/src/PHPMailer.php';
require './phpmailer/src/SMTP.php';

// Extrae las variables POST
extract($_POST);

// Incluye el archivo de conexión a la base de datos
include "conexion.php";

// Genera un código de verificación
$codigoVerificacion = bin2hex(random_bytes(6));


$consultaCedula = "SELECT COUNT(*) as total FROM persona WHERE cedula = '$cedula'";
$resultadoCedula = mysqli_query($connection, $consultaCedula);
$rowCedula = mysqli_fetch_assoc($resultadoCedula);
$totalCedulas = $rowCedula['total'];

if ($totalCedulas > 0) {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script language='JavaScript'>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'La cédula ya está registrada',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Volver',
            timer: 1500
          }).then(() => {
            location.assign('registro.php');
          });
    });
    </script>";
} else {
    // Verifica si la edad es mayor o igual a 12
    if ($edad < 12) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'LA EDAD DEBE SER DE 12 AÑOS O MAS',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Volver',
                timer: 5500
              }).then(() => {
                location.assign('registro.php');
              });
        });
        </script>";
    } else {
       
            // Obtiene la ID generada automáticamente en la última inserción
            $idUsuario = mysqli_insert_id($connection);

            // Inserta los datos en la tabla "persona" con la ID de usuario asociada
            $sqlPersona = "INSERT INTO persona(cedula, nombre, seg_nombre, apellido, seg_apellido, telefono, sexo, usuario, clave, correo, fecha_nac, parroquia, direccion, id_rol, cedula_rep, nombre_rep, apellido_rep, codigo) 
                    VALUES ('$cedula', '$nombre', '$segundo_nombre', '$apellido', '$segundo_apellido', '$telefono', '$sexo', '$usuario', '$clave', '$correo', '$fecha_nac', '$parroquia', '$direccion', '$id_rol', '$cedula_rep', '$nombre_rep', '$apellido_rep', '$codigoVerificacion')";
            $resultadoPersona = mysqli_query($connection, $sqlPersona);

            if ($resultadoPersona) {
                // Configura la conexión SMTP para PHPMailer
                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->Host       = 'smtp-mail.outlook.com';  // Cambia esto por tu servidor SMTP
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'Fundacite123@hotmail.com'; // Cambia esto por tu dirección de correo
                    $mail->Password   = 'yaracuy123'; // Cambia esto por tu contraseña
                    $mail->SMTPSecure = 'tls';
                    $mail->Port       = 587;
    
                    // Configura el remitente y el destinatario
                    $mail->setFrom('Fundacite123@hotmail.com', 'Fundacite|Yaracuy');
                    $mail->addAddress($correo);
    
                    // Asunto y cuerpo del correo
                    $mail->Subject = 'Bienvenido/a a Fundacite';
                    $mail->Body    = "¡Bienvenido/a a Fundacite, $nombre $apellido! Gracias por registrarte.\n\nPara verificar tu correo, ingresa el siguiente código en nuestro sitio web: $codigoVerificacion";
    
                    // Envía el correo
                    $mail->send();
    
                    header("Location: verificar.php");
                    exit(); 
                } catch (Exception $e) {
                    echo "Error al enviar el correo: {$mail->ErrorInfo}";
                }
            } else {
                echo "Error al insertar datos en la tabla 'persona': " . $connection->error;
            }
        } 
    }

?>