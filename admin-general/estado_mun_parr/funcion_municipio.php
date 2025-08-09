<?php

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
            //casos de registros
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

    $consulta = "UPDATE municipio SET municipio = '$nombre' WHERE id_municipio = '$id'";

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
                location.assign('registro_municipio.php');
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
                location.assign('registro_municipio.php');
              });
    });
        </script>";
    }
}
function eliminar()
{

    extract($_POST);
    require_once("conexion_ve.php");

    $consulta = "DELETE FROM municipio WHERE id_municipio = '$id' ";

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
                location.assign('registro_municipio.php');
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
                location.assign('registro_municipio.php');
              });
    });
        </script>";
    }
}