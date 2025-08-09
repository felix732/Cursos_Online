<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>

</head>

<body>

    <div class="modal fade" id="razon<?php echo $fila['id_plani']; ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Razon de porque Desactivar la Planificacion de <?php echo obtenerNombreCurso($fila['curso']); ?></h3>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                        <i class="fa fa-times" aria-hidden="true"></i></button>
                </div>
                <div class="modal-body">

                    <form action="./status.php" method="POST" autocomplete="off">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Razon</label>
                                    <input type="text" id="razon" name="razon" class="form-control" required>

                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="enviarCorreo" class="form-label">¿Enviar correos a los usuarios?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="enviarCorreo" id="enviarCorreoSi" value="si">
                                <label class="form-check-label" for="enviarCorreoSi">
                                    Sí
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="enviarCorreo" id="enviarCorreoNo" value="no" checked>
                                <label class="form-check-label" for="enviarCorreoNo">
                                    No
                                </label>
                            </div>
                        </div>

                        <input type="hidden" name="status" value="no_activo">
                        <input type="hidden" name="id" value="<?php echo $fila['id_plani']; ?>">
                        <br>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
