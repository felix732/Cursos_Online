<?php
if (isset($_GET['id'])) {
    $id_solicitud = $_GET['id'];

  include_once '../conexion_adm.php';

    if (!$connection) {
        die("Error de conexión: " . mysqli_connect_error());
    }
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rechazo de Solicitud</title>
    </head>
    <body>
        <div class="container">
            <h2>Rechazo de Solicitud</h2>
            <p>La solicitud con ID <?php echo $id_solicitud; ?> ha sido Rechazada</p>
        </div>
    </body>
    </html>
    <?php

    mysqli_close( $connection);
} else {
    header("Location: ./solicitudes.php");
}
?>
