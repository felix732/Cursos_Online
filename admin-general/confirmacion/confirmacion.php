<?php
// Obtener el ID de la solicitud desde la URL
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
        <title>Confirmación de Solicitud</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Confirmación de Solicitud</h2>
                    <p class="card-text">La solicitud con ID <?php echo $id_solicitud; ?> ha sido aceptada.</p>
                </div>
            </div>
        </div>
    </body>
    </html>
    <?php

    mysqli_close($connection);
} else {
    header("Location: ./solicitudes.php");
}
?>
