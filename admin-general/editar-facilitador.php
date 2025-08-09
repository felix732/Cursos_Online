<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Facilitador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Editar Facilitador</h2>

        <?php
$facilitador_id = mysqli_real_escape_string($connection, $_POST['id_persona']);
        require_once("./admin-general/conexion_adm.php");
        $query = "SELECT p.cedula, p.nombre, p.apellido, p.telefono, p.usuario, p.clave, p.correo, c.nombre_curso AS nombre_curso, ia.fecha_envio FROM persona p INNER JOIN informacion_academica ia ON p.id = ia.id_persona INNER JOIN curso c ON ia.id_curso = c.id_curso WHERE ia.estado <> 'PENDIENTE' AND p.id = $facilitador_id";
        $result = mysqli_query($connection, $query);

        if ($fila = mysqli_fetch_assoc($result)) :
        ?>
            <form action="editar_facilitador_sql.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="mb-3">
                    <label for="cedula" class="form-label">Cedula</label>
                    <input type="number" id="cedula" name="cedula" class="form-control" value="<?php echo $fila['cedula']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="nombre_curso" class="form-label">Curso</label>
                    <input type="text" id="nombre_curso" name="nombre_curso" class="form-control" value="<?php echo $fila['nombre_curso']; ?>" required>
                </div>

                <input type="hidden" name="accion" value="editar">
                <input type="hidden" name="id" value="<?php echo $facilitador_id; ?>">

                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        <?php endif; ?>

        <a href="adm-curso.php" class="btn btn-secondary mt-3">Atrás</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
