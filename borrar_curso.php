<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: iniciar_sesion.php");
    exit();
}

include_once './conexion.php';

if ($connection->connect_error) {
    die("Conexión fallida: " . $connection->connect_error);
}

$usuario = $_SESSION['id'];


$sqlObtenerPlanificacion = "SELECT id_planificacion FROM inscritos WHERE id_persona = '$usuario'";
$resultadoObtenerPlanificacion = $connection->query($sqlObtenerPlanificacion);

if ($resultadoObtenerPlanificacion->num_rows > 0) {
    $fila = $resultadoObtenerPlanificacion->fetch_assoc();
    $id_planificacion = $fila['id_planificacion'];

    $sqlEliminarRegistro = "DELETE FROM inscritos WHERE id_persona = '$usuario'";
    if ($connection->query($sqlEliminarRegistro) === TRUE) {
        $sqlSumarCupo = "UPDATE planificacion SET cupo = cupo + 1 WHERE id_plani = '$id_planificacion'";
        if ($connection->query($sqlSumarCupo) === TRUE) {
            echo "
             <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
             <script language='JavaScript'>
             document.addEventListener('DOMContentLoaded', function() {
                 Swal.fire({
                     icon: 'success',
                     title: 'Saliste del Curso.',
                     showCancelButton: false,
                     confirmButtonColor: '#3085d6',
                     confirmButtonText: 'OK',
                     timer: 5500
                   }).then(() => {
                     window.location.href = 'cursos_inscritos.php';
                   });
             });
             </script>
         ";
        } else {
            echo "Error al sumar un cupo a la planificación: " . $connection->error;
        }
    } else {
        echo "Error al eliminar el registro: " . $connection->error;
    }
} else {
    echo "Error: El usuario no está inscrito en ningún curso.";
}

$connection->close();
?>
