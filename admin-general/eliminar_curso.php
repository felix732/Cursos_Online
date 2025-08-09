<div class="modal fade" id="delete<?php echo $fila['id_curso']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-white text-black">
                <h3 class="modal-title" id="exampleModalLabel">Confirmar Eliminacion</h3>
                <button type="button" class="btn btn-black" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <div class="container">
                    <div class="row">
                        <dvi class="col-12 text-center">
                            <div class="alert alert-danger">
                                <p>¿Desea eliminar el Curso <b><?php echo $fila['nombre_curso']; ?></b>?</p>
                            </div>
                        </dvi>
                    </div>
                </div>
                <div class="row">
                    <dvi class="col-12 text-center">
                        <form action="funcion_curso.php" method="post">
                            <input type="hidden" name="accion" value="eliminar">
                            <input type="hidden" name="id" value="<?php echo $fila['id_curso']; ?>">

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            </div>

                        </form>
                    </dvi>
                </div>


            </div>
        </div>
    </div>