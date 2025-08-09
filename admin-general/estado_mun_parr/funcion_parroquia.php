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
    require_once("conexion_ve.php");

    $consulta = "UPDATE parroquia SET n_parroquia = '$nombre' WHERE id_parroquia = '$id'";

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
                location.assign('registro_parroquias.php');
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
                title: 'Algo salio mal. Intenta de nuevo',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('registro_parroquias.php');
              });
    });
        </script>";
    }
}
function eliminar()
{

    extract($_POST);
    require_once("conexion_ve.php");

    $consulta = "DELETE FROM parroquia WHERE id_parroquia = '$id' ";

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
                location.assign('registro_parroquias.php');
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
                title: 'Algo salio mal. Intenta de nuevo',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('registro_parroquias.php');
              });
    });
        </script>";
    }
}