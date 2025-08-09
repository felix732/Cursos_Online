<?php
// borrar_estudiante.php

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    // Verifica si la solicitud es GET y se proporciona el parámetro 'id'

    // Obtén el ID del estudiante a eliminar
    $id_estudiante = $_GET['id'];

    // Realiza la lógica para eliminar el estudiante en tu base de datos
    require_once("../admin-general/conexion_adm.php");

    // Puedes agregar alguna validación antes de ejecutar la eliminación
    $query = "DELETE FROM persona WHERE id = $id_estudiante";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Eliminación exitosa
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'El registro fue Eliminado correctamente',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('adm-estudiante.php');
              });
    });
        </script>";
        exit();
    } else {
        // Error al eliminar
        echo "Error al eliminar el estudiante. Por favor, vuelve a intentarlo.";
    }
} else {
    // Si la solicitud no es GET o no se proporciona 'id', redirige a alguna página apropiada
    header("Location: alguna_pagina.php");
    exit();
}
?>
