<?php
require_once("conexion_adm.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $consulta = mysqli_query($connection, "SELECT * FROM informacion_academica WHERE id_persona = '$id_persona'");
    $planificacion = mysqli_fetch_assoc($consulta);
    $id_persona = $planificacion['id_persona'];
}
?>

<div class="modal fade" id="cambioCursoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Cambiar Curso</h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

            <form action="envio_curso_faci.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <input type="hidden" name="id_persona" value="<?php echo $id_persona; ?>">

    <div class="row">
        <div class="col-sm-6">
            <div class="mb-3">
                <label for="nombre" class="form-label">Curso</label><br>
                <select name="curso_id" autocomplete="off" class="r-e">
                    <option value="" disabled selected>Selecciona Curso...</option>
                    <?php
                    include_once 'conexion_adm.php';
                    $queryy = mysqli_query($connection, "SELECT * FROM curso");
                    while ($datos = mysqli_fetch_array($queryy)) {
                        ?>
                        <option value="<?php echo $datos['curso_id'] ?>"><?php echo $datos['nombre_curso'] ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="register" name="registrar">Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
    </div>
</form>

        </div>
    </div>
</div>