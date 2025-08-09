<?php
include_once './conexion_adm.php';


if (! $connection) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtener el ID de la solicitud a aceptar
if (isset($_GET['id'])) {
    $id_solicitud = $_GET['id'];


    $sql = "UPDATE informacion_academica SET estado = 'ACEPTADA' WHERE id = $id_solicitud";

    if (mysqli_query( $connection, $sql)) {
      
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'El Trabajador se Acepto Correctamente',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 2500
              }).then(() => {
                location.assign('solicitudes.php');
              });
    });
        </script>
    ";
    } else {
        echo "Error al aceptar la solicitud: " . mysqli_error( $connection);
    }
}

mysqli_close( $connection);
?>
