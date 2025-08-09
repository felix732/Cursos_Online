<?php
extract($_POST);
include "conexion_adm.php";

$consultaCedula = "SELECT COUNT(*) as total FROM persona WHERE cedula = '$cedula'";
$resultadoCedula = mysqli_query($connection, $consultaCedula);
$rowCedula = mysqli_fetch_assoc($resultadoCedula);
$totalCedulas = $rowCedula['total'];

if ($totalCedulas > 0) {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script language='JavaScript'>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'La cédula ya está registrada',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Volver',
            timer: 1500
          }).then(() => {
            location.assign('adm-estudiante.php');
          });
    });
    </script>";
} else {
    if ($edad < 12) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'LA EDAD DEBE SER DE 12 AÑOS O MÁS',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Volver',
                timer: 5500
              }).then(() => {
                location.assign('adm-estudiante.php');
              });
        });
        </script>";
    } else {
        // Inserta los datos en la tabla "persona" con la ID de usuario asociada
        $sqlPersona = "INSERT INTO persona(cedula, nombre, seg_nombre, apellido, seg_apellido, telefono, sexo, usuario, clave, correo, fecha_nac, parroquia, direccion, id_rol, cedula_rep, nombre_rep, apellido_rep) 
                VALUES ('$cedula', '$nombre', '$segundo_nombre', '$apellido', '$segundo_apellido', '$telefono', '$sexo', '$usuario', '$clave', '$correo', '$fecha_nac', '$parroquia', '$direccion', '$id_rol', '$cedula_rep', '$nombre_rep', '$apellido_rep')";
        $resultadoPersona = mysqli_query($connection, $sqlPersona);

        if ($resultadoPersona) {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Registro exitoso',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Volver',
                    timer: 1500
                  }).then(() => {
                    location.assign('adm-estudiante.php');
                  });
            });
            </script>";
        } else {
            echo "Error al registrar el estudiante: " . mysqli_error($connection);
        }
    }
}

?>
