<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_aspirante = $_POST['id_aspirante'];
    $id_planificacion = $_POST['id_planificacion'];


    $fecha_inscripcion = date("d-m-y");
    require_once("conexion.php");

    if (!empty($id_aspirante) && !empty($id_planificacion)) {
        $sql = "INSERT INTO inscritos (id_persona, id_planificacion, fecha_inscripcion) VALUES ('$id_aspirante', '$id_planificacion', '$fecha_inscripcion')";
        $resultado = mysqli_query($connection, $sql);

        if ($resultado) {
            $update_sql = "UPDATE planificacion SET cupo = cupo - 1 WHERE id_plani = '$id_planificacion'";
            if ($connection->query($update_sql) === TRUE) {
                echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script language='JavaScript'>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Inscrito al Curso',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK',
                            timer: 1500
                        }).then(() => {
                            location.assign('cursos_inscritos.php');
                        });
                    });
                    </script>
                ";
            } else {
                echo "Error al actualizar los cupos disponibles para la planificación '$id_planificacion': " . $connection->error;
            }
        } else {
            echo "Error al realizar la inscripción: " . mysqli_error($connection);
        }
    } else {
        echo "Error: La ID de aspirante o la ID de planificación está vacía.";
    }
} else {
    echo "Acceso no permitido.";
}

?>
