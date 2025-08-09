<?php
require_once("../admin-general/conexion_adm.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion']) && $_POST['accion'] == 'editar') {
    $curso = $_POST['idCurso'];
    $id_plani = $_POST['id_plani'];
    $idPersona = $_POST['faci'];
    $cupos = $_POST['cupos'];
    $fechaInicio = $_POST['fechaInicio'];
    $fechaCierre = $_POST['fechaCierre'];
    $diasSemana = $_POST['diasSemana'];
    $objetivos = $_POST['objetivos'];
    $descripcion = $_POST['descripcion'];

    $fechaInicioTimestamp = strtotime($fechaInicio);
    $fechaCierreTimestamp = strtotime($fechaCierre);
    $diferenciaEnSegundos = $fechaCierreTimestamp - $fechaInicioTimestamp;

    $diferenciaEnDias = $diferenciaEnSegundos / (60 * 60 * 24);

$id_curso_query = mysqli_query($connection, "SELECT id_curso FROM curso WHERE id_curso = '$curso'");
$id_curso_info = mysqli_fetch_assoc($id_curso_query);
$id_curso = $id_curso_info['id_curso'];

$id_persona_query = mysqli_query($connection, "SELECT id_persona, id_curso FROM informacion_academica WHERE id_persona = '$idPersona'");
$id_persona_info = mysqli_fetch_assoc($id_persona_query);
$id_persona = $id_persona_info['id_persona'];
$id_curso_persona = $id_persona_info['id_curso'];

if ($id_curso !== $id_curso_persona) {
    echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Este facilitador no está apto para dar este curso.',
                showCancelButton: false,
                confirmButtonColor: '#d33',
                confirmButtonText: 'OK'
            }).then(() => {
                location.assign('consulta_plani.php');
            });
        });
        </script>
    ";
    exit();
}


    if ($diferenciaEnDias < 7) {
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
        exit();
    }

    // Actualizar la planificación en la base de datos
    $updateQuery = "UPDATE planificacion SET  facilitador = '$idPersona', cupo = '$cupos', fecha_inicio = '$fechaInicio', fecha_cierre = '$fechaCierre', dias_semana = '$diasSemana', objetivos = '$objetivos', descripcion = '$descripcion' WHERE id_plani = '$id_plani'";
    $result = mysqli_query($connection, $updateQuery);

    if ($result) {
        
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'La Planificacion $id_plani fue actualizado correctamente',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('consulta_plani.php');
              });
        });
        </script>";
        exit();
    } else {
        header("Location: editar-planificacion.php?id_plani=$id_plani&error=Error al actualizar la planificación");
        exit();
    }
} else {
    header("Location: editar-planificacion.php?error=Acceso no autorizado");
    exit();
}
?>
