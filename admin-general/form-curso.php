<div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Agregar Curso</h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="../admin-general/envio-form-curso.php" method="POST" enctype="multipart/form-data" autocomplete="off">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre Curso</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" required>

                            </div>
                        </div>


                        <div class="col-sm-6">
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
                    </div>

                    <br>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="register" name="registrar">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>

            </div>

            </form>
        </div>
    </div>
</div>