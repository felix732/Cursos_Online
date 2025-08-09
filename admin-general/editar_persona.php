<?php
require_once("../admin-general/conexion_adm.php");

// Verificar si se ha proporcionado un id en la URL
if (isset($_GET['id'])) {
    $id_persona = $_GET['id'];

    // Consultar los datos de la persona con el id proporcionado
    $consulta = "SELECT * FROM persona WHERE id = $id_persona";
    $resultado = mysqli_query($connection, $consulta);

    if ($resultado) {
        $datos_persona = mysqli_fetch_assoc($resultado);
        mysqli_free_result($resultado);
    } else {
        echo "Error en la consulta: " . mysqli_error($connection);
        exit();
    }
} else {
    echo "No se proporcionó un ID de persona válido.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edición/Información de datos de Persona</title>
    <style>
        body {
            background: linear-gradient(to bottom, #87CEEB, #00FA9A);
        }

        #containerr {
            border-radius: 20px;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 40%;
            border: solid 1px black;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5" id="containerr">
        <h2 class="text-center">Editar/Información Persona</h2>

        <form action="./editar_evio_persona.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <input type="hidden" name="id_persona" value="<?php echo $datos_persona['id']; ?>">
            <div class="mb-3">
                <label for="cedula" class="form-label">Cédula</label>
                <input type="number" id="cedula" name="cedula" class="form-control" value="<?php echo $datos_persona['cedula']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $datos_persona['nombre']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="segundo_nombre" class="form-label">Segundo Nombre</label>
                <input type="text" id="segundo_nombre" name="segundo_nombre" class="form-control" value="<?php echo $datos_persona['seg_nombre']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" id="apellido" name="apellido" class="form-control" value="<?php echo $datos_persona['apellido']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="segundo_apellido" class="form-label">Segundo Apellido</label>
                <input type="text" id="segundo_apellido" name="segundo_apellido" class="form-control" value="<?php echo $datos_persona['seg_apellido']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="number" id="telefono" name="telefono" class="form-control" value="<?php echo $datos_persona['telefono']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="sexo" class="form-label">Sexo</label>
                <input type="radio" name="sexo" value="F" <?php echo ($datos_persona['sexo'] == 'F') ? 'checked' : ''; ?>>F
                <input type="radio" name="sexo" value="M" <?php echo ($datos_persona['sexo'] == 'M') ? 'checked' : ''; ?>>M
            </div>

            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" id="usuario" name="usuario" class="form-control" value="<?php echo $datos_persona['usuario']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="clave" class="form-label">Clave</label>
                <input type="text" id="clave" name="clave" class="form-control" value="<?php echo $datos_persona['clave']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" id="correo" name="correo" class="form-control" value="<?php echo $datos_persona['correo']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="fecha_nac" class="form-label">Fecha Nac.</label>
                <input type="date" id="fecha_nac" name="fecha_nac" class="form-control" value="<?php echo $datos_persona['fecha_nac']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="parroquia" class="form-label">Parroquia</label>
                <input type="text" id="parroquia" name="parroquia" class="form-control" value="<?php echo $datos_persona['parroquia']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" id="direccion" name="direccion" class="form-control" value="<?php echo $datos_persona['direccion']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="rol" class="form-label">ROL</label>
                <?php
                require_once("../admin-general/conexion_adm.php");
                $query_roles = "SELECT id, rol FROM roles";
                $result_roles = mysqli_query($connection, $query_roles);

                if ($result_roles) {
                    echo '<select name="id_rol" id="rol" class="form-control">';
                    while ($fila_rol = mysqli_fetch_assoc($result_roles)) {
                        $id_rol = $fila_rol['id'];
                        $nombre_rol = $fila_rol['rol'];

                        $selected = ($id_rol == $datos_persona['id_rol']) ? 'selected' : '';

                        echo "<option value=\"$id_rol\" $selected>$nombre_rol</option>";
                    }
                    echo '</select>';
                } else {
                    echo '<p>Error al obtener los roles</p>';
                }
                ?>
            </div>

            <div class="mb-3">
                <label for="cedula_rep" class="form-label">Cédula Rep.</label>
                <input type="text" id="cedula_rep" name="cedula_rep" class="form-control" value="<?php echo $datos_persona['cedula_rep']; ?>">
            </div>

            <div class="mb-3">
                <label for="nombre_rep" class="form-label">Nombre Rep.</label>
                <input type="text" id="nombre_rep" name="nombre_rep" class="form-control" value="<?php echo $datos_persona['nombre_rep']; ?>">
            </div>

            <div class="mb-3">
                <label for="apellido_rep" class="form-label">Apellido Rep.</label>
                <input type="text" id="apellido_rep" name="apellido_rep" class="form-control" value="<?php echo $datos_persona['apellido_rep']; ?>">
            </div>

            <button type="submit" class="btn btn-primary">Guardar Datos</button>
            <a href="./adm-estudiante.php" class="btn btn-primary">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
