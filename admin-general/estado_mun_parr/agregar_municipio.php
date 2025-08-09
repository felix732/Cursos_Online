<div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Agregar Municipio</h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="envio_municipio.php" method="POST" enctype="multipart/form-data" autocomplete="off">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Estado del Municipio</label><br>
                                <select name="estado" autocomplete="off" class="r-e">
                                    <?php
                                    include_once 'conexion_ve.php';
                                    $queryy=mysqli_query($connection,"SELECT * FROM estado");
                                     while ($datos = mysqli_fetch_array($queryy))
                                            {
                    
                                            ?>
                                        <option value="<?php echo $datos['id_estado']?>"><?php echo $datos['n_estado']?></option>
                                            <?php
                                                }
                    ?></td>
                </select>

                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre Municipio</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" required>

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