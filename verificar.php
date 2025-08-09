<?php
// Incluye el archivo de conexión a la base de datos
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extrae el código, usuario y clave ingresados por el usuario
    $codigoIngresado = mysqli_real_escape_string($connection, $_POST['codigo']);
    $usuarioIngresado = mysqli_real_escape_string($connection, $_POST['usuario']);
    $claveIngresada = mysqli_real_escape_string($connection, $_POST['clave']);

    // Recupera los datos del usuario para verificar el código
    $sql = "SELECT id, correo_verificado FROM persona WHERE correo_verificado = 0 AND codigo = '$codigoIngresado'";
    $resultado = mysqli_query($connection, $sql);

    if ($resultado) {
        // Verifica si el código ingresado es correcto
        if (mysqli_num_rows($resultado) > 0) {
            $fila = mysqli_fetch_assoc($resultado);
            $idPersona = $fila['id'];

            // Realiza la verificación del usuario y la clave
            $sqlUsuarioClave = "INSERT INTO usuario (id, usuario, clave) VALUES ('$idPersona', '$usuarioIngresado', '$claveIngresada')";
            if (mysqli_query($connection, $sqlUsuarioClave)) {
                // Actualiza el estado de verificación del correo
                $updateVerificacion = "UPDATE persona SET correo_verificado = 1 WHERE codigo = '$codigoIngresado'";
                mysqli_query($connection, $updateVerificacion);

                echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Correo verificado correctamente',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 3000
                    }).then(() => {
                        location.assign('iniciar_sesion.php');
                    });
                });
                </script>";
            } else {
                echo "Error al insertar usuario y clave: " . mysqli_error($connection);
            }
        } else {
            echo "<p style='color: red; text-align: center; font-weight: bold;'>Error de código. Verifica el código ingresado.</p>";
        }
    } else {
        echo "Error en la consulta: " . $connection->error;
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de Correo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Verificación de Correo</h2>
                    </div>
                    <div class="card-body">
                    <p class="text-center">Si no verificas el correo en 3 dias se borrara el registro de tu Informacion</p>
                        <p class="text-center">Se ha enviado un código de verificación a tu correo. Por favor, ingrésalo a continuación:</p>
                        <form method="post">
    <div class="form-group">
        <label for="codigo">Código de Verificación:</label>
        <input type="text" class="form-control" id="codigo" name="codigo" required>
    </div>
    <div class="form-group">
        <label for="usuario">Ingresa el Usuario Nuevamente:</label>
        <input type="text" class="form-control" id="usuario" name="usuario" required>
    </div>
    <div class="form-group">
        <label for="clave"> Ingresa la Clave Nuevamente:</label>
        <input type="password" class="form-control" id="clave" name="clave" required>
    </div>
    <button type="submit" class="btn btn-primary">Verificar</button>
</form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
