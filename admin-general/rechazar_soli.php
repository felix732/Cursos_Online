<?php
include_once './conexion_adm.php';


if (! $connection) {
    die("Error de conexión: " . mysqli_connect_error());
}


if (isset($_GET['id'])) {
    $id_solicitud = $_GET['id'];


    $sql = "DELETE FROM informacion_academica WHERE id = $id_solicitud";

    if (mysqli_query( $connection, $sql)) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Se Rechazo al Trabajador con Exito',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 2500
              }).then(() => {
                location.assign('solicitudes.php');
              });
    });
        </script>";
    } else {
        echo "Error al rechazar la solicitud: " . mysqli_error( $connection);
    }
}
mysqli_close( $connection);
?>
