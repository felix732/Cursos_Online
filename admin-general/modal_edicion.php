<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facilitador</title>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>

</head>

<body>

    <div class="modal fade" id="select" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Seleccionar un Facilitador</h3>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                        <i class="fa fa-times" aria-hidden="true"></i></button>
                </div>
                <div class="modal-body">
                <input type="text" class="form-control" id="searchInput" placeholder="Buscar..."><br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Curso que Imparte</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
                <?php
                            require_once("conexion_adm.php");

                            $result = mysqli_query($connection, "SELECT * FROM informacion_academica WHERE estado <> 'PENDIENTE'");

                            while ($fila = mysqli_fetch_assoc($result)) :
                                // Obtener información de la persona usando el id_persona
                                $id_persona = $fila['id_persona'];
                                $persona_query = mysqli_query($connection, "SELECT nombre, apellido FROM persona WHERE id = $id_persona");
                                $persona_info = mysqli_fetch_assoc($persona_query);

                                $id_curso = $fila['id_curso'];
                                $curso_query = mysqli_query($connection, "SELECT nombre_curso FROM curso WHERE id_curso = $id_curso");
                                $curso_info = mysqli_fetch_assoc($curso_query);
                                ?>
                                <tr>
                                    <td><?php echo $persona_info['nombre'] . ' ' . $persona_info['apellido']; ?></td>
                                    <td><center><?php echo $curso_info['nombre_curso']; ?></center></td>
                                    <td>
                                    <button type="button" class="btn btn-warning" onclick="seleccionarFacilitador(<?php echo $id_persona; ?>, '<?php echo $persona_info['nombre'] . ' ' . $persona_info['apellido']; ?>', '<?php echo $curso_info['nombre_curso']; ?>')">
                                        SELECCIONAR
                                    </button>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
				</tbody>
			</table>
                </div>
            </div>
        </div>
    </div>
    <script>
    function seleccionarFacilitador(idPersona, nombreFacilitador) {
        document.getElementById('faci').value = nombreFacilitador;
        document.getElementById('idPersona').value = idPersona; // Nuevo campo para la ID
        $('#select').modal('hide'); // Oculta el modal después de seleccionar
    }
        $(document).ready(function() {
        // Función para manejar el evento de cambio en el input de búsqueda
        $('#searchInput').on('input', function() {
            // Obtén el valor del input de búsqueda
            var searchTerm = $(this).val().toLowerCase();

            // Filtra las filas de la tabla según el término de búsqueda
            $('#dataTable tbody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchTerm) > -1);
            });
        });
    });
</script>

</body>

</html>
