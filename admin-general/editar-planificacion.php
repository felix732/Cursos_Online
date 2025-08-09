<?php

require_once("../admin-general/conexion_adm.php");

$id_plani = $_GET['id_plani'];

$consulta = mysqli_query($connection, "SELECT p.*, c.nombre_curso FROM planificacion p JOIN curso c ON p.curso = c.id_curso WHERE p.id_plani = '$id_plani'");
$planificacion = mysqli_fetch_assoc($consulta);
$id_facilitador = $planificacion['facilitador'];
$facilitador_query = mysqli_query($connection, "SELECT * FROM persona WHERE id = '$id_facilitador'");
$facilitador = mysqli_fetch_assoc($facilitador_query);
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Planificación</title>
    <style>
        body {
            background: linear-gradient(to right, #b3e0ff, #66ff66);
            margin: 0;
            padding: 0;
        }

        .container-oval {
            background: white;
            border-radius: 15px;
            padding: 20px;
            width: 30%;
            margin: auto;
            margin-top: 50px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        #faci{
            max-width: 40%;
        }

        #form-labell{
            transform: translate(180%, -297%);
        }
        #cursoSeleccionado{
            max-width: 40%;
            transform: translate(150%, -163%);
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="./js/jquery.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container-oval">
    <h2 class="mb-4">Editar Planificación - <?php echo $planificacion['nombre_curso']; ?></h2>

        <form action="./envio_edicion_plani.php" method="post">
        <input type="hidden" name="accion" value="editar">

            <div class="mb-3">
                <center><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#select">
                        Seleccionar Facilitador
                    </button></center><br>
                <label for="faci" class="form-label">Facilitador seleccionado|</label>
                <input type="text" class="form-control" id="faci" name="facii" value="<?php echo $facilitador['nombre']; ?> - <?php echo $facilitador['apellido']; ?>" readonly>
                <label for="cursoSeleccionado" class="form-labell" id="form-labell">Curso que Imparte|</label>
                <input type="hidden" id="idCurso" name="curso" value="<?php echo $planificacion['curso']; ?>">
                <input type="hidden" id="idCurso" name="idCurso" value="<?php echo $planificacion['curso']; ?>">
                <input type="text" class="form-control" id="cursoSeleccionado" name="cursoSeleccionado" value="<?php echo $planificacion['curso']; ?>" readonly>
                <input type="hidden" id="idPersona" name="faci" value="<?php echo $facilitador['id']; ?>">
            </div>

            <div class="mb-3">
                <label for="cupos" class="form-label">Cupos:</label>
                <input type="number" class="form-control" id="cupos" name="cupos" value="<?php echo $planificacion['cupo']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="fechaInicio" class="form-label">Fecha de Inicio:</label>
                <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" value="<?php echo $planificacion['fecha_inicio']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="fechaCierre" class="form-label">Fecha de Cierre:</label>
                <input type="date" class="form-control" id="fechaCierre" name="fechaCierre" value="<?php echo $planificacion['fecha_cierre']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="diasSemana" class="form-label">Días de la Semana</label>
                <select class="form-select" id="diasSemana" name="diasSemana" required>
                    <option value="1" <?php echo ($planificacion['dias_semana'] == 1) ? 'selected' : ''; ?>>1</option>
                    <option value="2" <?php echo ($planificacion['dias_semana'] == 2) ? 'selected' : ''; ?>>2</option>
                    <option value="3" <?php echo ($planificacion['dias_semana'] == 3) ? 'selected' : ''; ?>>3</option>
                    <option value="4" <?php echo ($planificacion['dias_semana'] == 4) ? 'selected' : ''; ?>>4</option>
                    <option value="5" <?php echo ($planificacion['dias_semana'] == 5) ? 'selected' : ''; ?>>5</option>
                    <option value="6" <?php echo ($planificacion['dias_semana'] == 6) ? 'selected' : ''; ?>>6</option>
                    <option value="7" <?php echo ($planificacion['dias_semana'] == 7) ? 'selected' : ''; ?>>7</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="objetivos" class="form-label">Objetivos</label>
                <textarea class="form-control" id="objetivos" name="objetivos" rows="3" required><?php echo $planificacion['objetivos']; ?></textarea>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?php echo $planificacion['descripcion']; ?></textarea>
            </div>

            <input type="hidden" name="id_plani" value="<?php echo $id_plani; ?>">

            <button type="submit" class="btn btn-primary">Guardar Cambios</button><br><br>
            <a href="consulta_plani.php" class="btn btn-primary">Atras</a>
        </form>
    </div>
    <?php include './modal_edicion.php';?>
    <script>
    function seleccionarFacilitador(idPersona, nombreFacilitador, cursoSeleccionado) {
    document.getElementById('faci').value = nombreFacilitador;
    document.getElementById('idPersona').value = idPersona;
    document.getElementById('cursoSeleccionado').value = cursoSeleccionado;

    // Establece el valor del campo oculto para la ID del curso
    document.getElementById('idCurso').value = cursoSeleccionado;

    $('#select').modal('hide');
}
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-yUe8kA2sWarpLhbe1IT5ylKFIQUyAo9vZb5egiHTtZvFuTDObFEqM+qDkQahvxH+" crossorigin="anonymous"></script>
</body>

</html>
