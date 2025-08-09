<?php

include './conexion_adm.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $solicitud_id = mysqli_real_escape_string($connection, $_GET['id']);

    // Obtener información de la solicitud
    $sql_solicitud = "SELECT * FROM solicitud_curso WHERE id = '$solicitud_id'";
    $resultado_solicitud = mysqli_query($connection, $sql_solicitud);

    if ($resultado_solicitud && mysqli_num_rows($resultado_solicitud) == 1) {
        $fila_solicitud = mysqli_fetch_assoc($resultado_solicitud);
        $id_facilitador = $fila_solicitud['id_facilitador'];
        $id_planificacion = $fila_solicitud['id_planificacion'];

        // Actualizar estado en la tabla solicitud_curso
        $sql_update_solicitud = "UPDATE solicitud_curso SET estado = 'ACEPTADA' WHERE id = '$solicitud_id'";
        if (mysqli_query($connection, $sql_update_solicitud)) {
            // Actualizar facilitador en la tabla planificacion
            $sql_update_planificacion = "UPDATE planificacion SET facilitador = '$id_facilitador' WHERE id_plani = '$id_planificacion'";
            if (mysqli_query($connection, $sql_update_planificacion)) {
                echo "Solicitud aceptada correctamente.";
            } else {
                echo "Error al actualizar la planificación: " . mysqli_error($connection);
            }
        } else {
            echo "Error al actualizar la solicitud: " . mysqli_error($connection);
        }
    } else {
        echo "Solicitud no encontrada.";
    }
} else {
    echo "Acceso no autorizado.";
}

mysqli_close($connection);
?>