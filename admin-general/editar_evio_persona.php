<?php
require_once("../admin-general/conexion_adm.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $id_persona = $_POST['id_persona'];
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $segundo_nombre = $_POST['segundo_nombre'];
    $apellido = $_POST['apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $telefono = $_POST['telefono'];
    $sexo = $_POST['sexo'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $correo = $_POST['correo'];
    $fecha_nac = $_POST['fecha_nac'];
    $parroquia = $_POST['parroquia'];
    $direccion = $_POST['direccion'];
    $id_rol = $_POST['id_rol'];
    $cedula_rep = $_POST['cedula_rep'];
    $nombre_rep = $_POST['nombre_rep'];
    $apellido_rep = $_POST['apellido_rep'];

    // Actualizar los datos en la base de datos
    $consulta_actualizar = "UPDATE persona SET 
        cedula='$cedula', 
        nombre='$nombre', 
        seg_nombre='$segundo_nombre', 
        apellido='$apellido', 
        seg_apellido='$segundo_apellido', 
        telefono='$telefono', 
        sexo='$sexo', 
        usuario='$usuario', 
        clave='$clave', 
        correo='$correo', 
        fecha_nac='$fecha_nac', 
        parroquia='$parroquia', 
        direccion='$direccion', 
        id_rol='$id_rol', 
        cedula_rep='$cedula_rep', 
        nombre_rep='$nombre_rep', 
        apellido_rep='$apellido_rep' 
        WHERE id=$id_persona";

    $resultado_actualizar = mysqli_query($connection, $consulta_actualizar);

    if ($resultado_actualizar) {
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
        echo "Error al actualizar los datos: " . mysqli_error($connection);
    }
} else {
    echo "Acceso no permitido.";
}

mysqli_close($connection);
?>
