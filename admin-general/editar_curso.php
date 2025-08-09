<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso</title>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>

</head>


<div class="modal fade" id="editar<?php echo $fila['id_curso']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Editar Curso <?php echo $fila['nombre_curso']; ?></h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="funcion_curso.php" method="POST">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Curso</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $fila['nombre_curso']; ?>" required>

                            </div>
                            <div class="mb-3">
                            <label for="nombre" class="form-label">Categoria</label><br>
                            <select name="cate" id="">
                            <?php
$categorias = array(
    "TECNOLOGIA", "IDIOMAS", "COMUNICACION", "MATEMATICAS", "CIENCIAS", "ARTE",
    "HISTORIA", "DEPORTES", "COCINA", "MODA", "NEGOCIOS", "MEDICINA", "MÚSICA",
    "FOTOGRAFÍA", "DISEÑO", "PSICOLOGÍA", "CINE", "LITERATURA", "POLÍTICA", "ECONOMÍA", "AGRICULTURA", "ASTRONOMIA", "COSECHA",
);

var_dump($categorias);

foreach ($categorias as $categoria) {
    echo "<option value='$categoria'>$categoria</option>";
}
?>
</select>

                            </div>
                        </div>
                    <input type="hidden" name="accion" value="editar">
                    <input type="hidden" name="id" value="<?php echo $fila['id_curso']; ?>">
                    <br>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Editar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>

            </div>


            </form>
        </div>
    </div>
</div>
</div>




</html>