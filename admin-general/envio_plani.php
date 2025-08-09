<?php

$curso = $_POST['curso'];
$status = $_POST['status'];
$cupo = $_POST['max-registrations'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_cierre = $_POST['fecha_cierre'];
$dias = $_POST['dias'];
$faci = $_POST['faci'];
$objetivos = $_POST['objetivos'];
$descripcion = $_POST['descripcion'];

include "conexion_adm.php";

$id_curso_query = mysqli_query($connection, "SELECT id_curso FROM curso WHERE id_curso = '$curso'");
$id_curso_info = mysqli_fetch_assoc($id_curso_query);
$id_curso = $id_curso_info['id_curso'];

// Obtener la ID de la persona del facilitador
$id_persona_query = mysqli_query($connection, "SELECT id_persona, id_curso FROM informacion_academica WHERE id_persona = '$faci'");
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
                location.assign('planif-11.php');
            });
        });
        </script>
    ";
    exit();
}

if (empty($curso)) {
    echo "Por favor, ingresa el nombre del curso.";
} elseif ($cupo <= 0) {
    echo "El número de cupos debe ser mayor a cero.";
} else {
    $fechaInicio = strtotime($fecha_inicio);
    $fechaCierre = strtotime($fecha_cierre);
    $diferenciaFechas = $fechaCierre - $fechaInicio;
    $diferenciaDias = floor($diferenciaFechas / (60 * 60 * 24));

    if ($diferenciaDias < 7) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'La diferencia entre la fecha de inicio y cierre debe ser de al menos una semana.',
                showCancelButton: false,
                confirmButtonColor: '#d33',
                confirmButtonText: 'OK'
            }).then(() => {
                location.assign('planif-11.php');
            });
        });
        </script>
    ";
        exit();
    } else {
        $sql_count = "SELECT COUNT(*) AS num_registrations FROM planificacion WHERE curso = '$curso'";
        $result_count = mysqli_query($connection, $sql_count);
        $row_count = mysqli_fetch_assoc($result_count);
        $num_registrations = $row_count['num_registrations'];

        if ($num_registrations >= $cupo) {
            echo "Se ha alcanzado el máximo número de registros para este curso.";
        } else {
            $sql_check_duplicate = "SELECT COUNT(*) AS num_duplicates FROM planificacion WHERE curso = '$curso' AND statuss = 'Activo'";
            $result_check_duplicate = mysqli_query($connection, $sql_check_duplicate);
            $row_check_duplicate = mysqli_fetch_assoc($result_check_duplicate);
            $num_duplicates = $row_check_duplicate['num_duplicates'];

            if ($num_duplicates > 0) {
                echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ya existe una planificación activa para este curso.',
                        showCancelButton: false,
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        location.assign('planif-11.php');
                    });
                });
                </script>
            ";
            }else {
                  // Insertar la planificación
                  $sql = "INSERT INTO planificacion (curso, statuss, cupo, fecha_inicio, fecha_cierre, dias_semana, facilitador, objetivos, descripcion) 
                  VALUES ('$curso', '$status', '$cupo', '$fecha_inicio', '$fecha_cierre', '$dias', '$faci',  '$objetivos', '$descripcion')";
                  $resultado = mysqli_query($connection, $sql);
  
                  if ($resultado) {
                      // Verificar el estado para ajustar la fecha de inicio
                      if ($status === 'no_activo') {
                          // Sumar 24 horas a la fecha de inicio
                          $nuevaFechaInicio = date('Y-m-d H:i:s', strtotime($fecha_inicio . ' + 1 day'));
                          $sql_actualizar_fecha = "UPDATE planificacion SET fecha_inicio = '$nuevaFechaInicio' WHERE curso = '$curso'";
                          mysqli_query($connection, $sql_actualizar_fecha);
                      }

                      header("location: consulta_plani.php");
                  } else {
                      echo "Error al insertar datos: " . $connection->error;
                  }
              }
          }
      }
  }
  
  if ($connection->connect_error) {
      die("Error de conexión: " . $connection->connect_error);
  }

?>
