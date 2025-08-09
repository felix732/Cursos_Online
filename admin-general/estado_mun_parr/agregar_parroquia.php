<div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Agregar Parroquia</h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="./envio_parroquia.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Estado</label><br>
                                <select name="estado" id="estado" autocomplete="off" class="r-e" onchange="cargarMunicipios()">
                                    <option value="" disabled selected>Selecciona un Estado</option>
                                    <?php
                                    include_once 'conexion_ve.php';
                                    $queryy = mysqli_query($connection, "SELECT * FROM estado");
                                    while ($datos = mysqli_fetch_array($queryy)) {
                                    ?>
                                        <option value="<?php echo $datos['id_estado'] ?>"><?php echo $datos['n_estado'] ?></option>
                                    <?php
                                    }
                                    ?></td>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Municipio de la Parroquia</label><br>
                                <select name="municipio" id="municipio" autocomplete="off" class="r-e">
                                    
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre de la Parroquia</label>
                                <input type="text" id="nombre" name="n_parroquia" class="form-control" required>
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
</div>

<script>
    function cargarMunicipios() {
        var estadoSeleccionado = document.getElementById("estado").value;
        var municipioSelect = document.getElementById("municipio");

        // Limpia opciones anteriores
        municipioSelect.innerHTML = "";

        // Realiza una llamada AJAX para obtener los municipios correspondientes al estado seleccionado
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "obtener_municipios.php?estado=" + estadoSeleccionado, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var municipios = JSON.parse(xhr.responseText);

                // Actualiza el contenido del segundo select con los municipios obtenidos
                municipios.forEach(function (municipio) {
                    var option = document.createElement("option");
                    option.value = municipio.id_municipio;
                    option.text = municipio.municipio;
                    municipioSelect.add(option);
                });
            }
        };
        xhr.send();
    }
</script>
