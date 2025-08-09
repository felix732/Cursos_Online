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
    $consulta = "UPDATE aspirante SET cedula = '$cedula', nombre = '$nombre', apellido = '$apellido', telefono = '$telefono',
     cursos = '$curso', segundo_cursos = '$seg_curso', sexo = '$sex', direccion = '$direc', correo = '$email'  WHERE id = '$id' ";
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
                location.assign('adm-estudiante.php');
              });
    });
        </script>
    ";
    } else {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Algo salio mal. Intenta de nuevo',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('adm-estudiante.php');
              });
    });
        </script>";
    }
}

function eliminar()
{
    extract($_POST);
    require_once("conexion_adm.php");
    $consulta = "DELETE FROM aspirante WHERE id = '$id' ";
    $resultado = mysqli_query($connection , $consulta);
    if ($resultado) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'El aspirante fue Eliminado correctamente',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('adm-estudiante.php');
              });
    });
        </script>
    ";
    } else {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Error al Eliminar el Aspirante',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('adm-estudiante.php');
              });
    });
        </script>
    ";
    }
}