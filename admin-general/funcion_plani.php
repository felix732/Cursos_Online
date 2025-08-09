<?php

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
            
        case 'editar':
            editar();
            break;

        case 'eliminar':
            eliminar();
            break;
    }
}

function editar()
{
    extract($_POST);
    require_once("conexion_adm.php");

    $fechaInicio = strtotime($fecha_inicio);
    $fechaCierre = strtotime($fecha_cierre);

    if ($fechaInicio >= $fechaCierre || ($fechaCierre - $fechaInicio) < (7 * 24 * 60 * 60)) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error en las fechas',
                text: 'La diferencia entre la fecha de inicio y la fecha de cierre debe ser de al menos una semana.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 5500
              }).then(() => {
                location.assign('consulta_plani.php');
              });
        });
        </script>";
        return;
    }

    // Resto del código para actualizar el registro
    $consulta = "UPDATE planificacion SET 
                    curso = '$curso',  
                    cupo = '$cupos', 
                    fecha_inicio = '$fecha_inicio', 
                    fecha_cierre = '$fecha_cierre', 
                    dias_semana = '$dias', 
                    facilitador = '$faci', 
                    objetivos = '$objetivos', 
                    descripcion = '$descripcion'  
                WHERE id_plani = '$id'";

    $resultado = mysqli_query($connection, $consulta);

    if ($resultado) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'El registro fue actualizado correctamente',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('consulta_plani.php');
              });
        });
        </script>";
    } else {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Algo salió mal. Intenta de nuevo',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('consulta_plani.php');
              });
        });
        </script>";
    }
}


function eliminar()
{
    extract($_POST);
    require_once("conexion_adm.php");

    $consulta = "DELETE FROM planificacion WHERE id_plani = '$id' ";

    $resultado = mysqli_query($connection, $consulta);

    if ($resultado) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'El registro fue eliminado correctamente',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('consulta_plani.php');
              });
        });
        </script>";
    } else {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Algo salió mal. Intenta de nuevo',
                text: 'Posiblemente hay gente cursando. Si hay usuarios cursando, no se podrá eliminar.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 5500
              }).then(() => {
                location.assign('consulta_plani.php');
              });
        });
        </script>";
    }
}
?>
