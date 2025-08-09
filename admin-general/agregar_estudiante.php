<div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Agregar Persona</h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="./envio_persona.php" method="POST" enctype="multipart/form-data" autocomplete="off">

                    <div class="row">
                        <div class="col-sm-6">
                        <div class="mb-3">
                                <label for="nombre" class="form-label">Cedula</label>
                                <input type="number" id="cedula" name="cedula" class="form-control" required>

                            </div>
                            <input type="hidden" value="2" name="id_rol">
                            <input type="hidden" value="PENDIENTE" name="estado">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" required><br>
                                <input type="text" name="segundo_nombre" class="form-control" id="segundo_nombre" placeholder="Segundo Nombre">
                            </div>
                            
                        </div>


                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Apellido</label>
                                <input type="text" id="apellido" name="apellido" class="form-control" required><br>
                                <input type="text" name="segundo_apellido" id="segundo_apellido"  class="form-control" placeholder="Segundo Apellido"><br>
                                <label for="" class="form-label">Rol de la Persona</label>
                            <?php
                                require_once("../admin-general/conexion_adm.php");
                                $query_roles = "SELECT id, rol FROM roles WHERE id <> 1";
                                $result_roles = mysqli_query($connection, $query_roles);

                                if ($result_roles) {
                                echo '<select name="id_rol" id="" class="form-control">';
                                while ($fila_rol = mysqli_fetch_assoc($result_roles)) {
                                $id_rol = $fila_rol['id'];
                                $nombre_rol = $fila_rol['rol'];
                                echo "<option value=\"$id_rol\">$nombre_rol</option>";
                                }
                                echo '</select>';
                                } else {
                                echo '<p>Error al obtener los roles</p>';
                                }
                            ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Usuario</label>
                                <input type="text" id="usuario" name="usuario" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Clave</label>
                                <input type="password" id="clave" name="clave" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-3">
                                <label for="nombre" class="form-label">Correo</label>
                                <input type="email" id="email" name="correo" class="form-control" required>
                                            
                            </div>
                    </div>

                    <div class="col-sm-6">
                                <label for="nombre" class="form-label">Telefono</label>
                                <input type="number" id="telefono" name="telefono" class="form-control" required>
                                <div class="fechita">
                              <div class="col-sm-6">     
                              <label for="date" class="form-label">Fecha Nac.</label><br>
                            <input type="date" name="fecha_nac" id="date" class="nacido">
                            <input type="text" id="edad" name="edad" class="edad" readonly placeholder="tu edad es">
                                </div>
                                <div class="col-sm-6" id="datos_representante">        
                    <div class="title1"><label for="" class="form-label">Datos de Representante</label><br></div>
    
                    <input  type="text" id="cedula" name="cedula_rep" placeholder="cedula" maxlength="10" >

                    <input  type="text" name="nombre_rep" placeholder="nombre" id="nombre" maxlength="60"><br>

                    <input  type="text"  id="apellido" name="apellido_rep" placeholder="Apellido" maxlength="60"><br>
                </div><br><br>
                        </div>
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Sexo</label><br>
                                <input type="radio" name="sexo" value="F" checked>F
                                <input type="radio" name="sexo" value="M">M

                            </div>
                            <div class="mb-3">
                            <label for="" class="form-label">Estado</label>
                <select name="estado" id="estado" autocomplete="off" class="direct" onchange="cargarMunicipios()">
                <option value="" disabled selected>Selecciona un Estado</option>
                    <?php
                    include_once 'conexion.php';
                    $queryy = mysqli_query($connection, "SELECT * FROM estado");
                    while ($datos = mysqli_fetch_array($queryy)) {
                    ?>
                <option value="<?php echo $datos['id_estado'] ?>"><?php echo $datos['n_estado'] ?></option>
                <?php
                }
                ?>
                </select><br>
                <label for="" class="form-label">Municipio</label>
                <select name="municipio" id="municipio" autocomplete="off" class="direct" onchange="cargarParroquia()">
                <option value="" disabled selected>Selecciona un Municipio</option>
                </select>
                    <br>
                    <label for="" class="form-label">Parroquia</label>
                <select class="direct" name= "parroquia" id="parroquia" onchange="obtenerIdParroquia()">
                <option value="" disabled selected>Selecciona una Parroquia</option>
                </select><br>
                                <label for="nombre" class="form-label">Direccion</label>
                                <input type="text" id="direc" name="direccion" class="form-control" required>

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
<script>
     const date = document.getElementById("date");
    const edad = document.getElementById("edad");
    const calcular = (date) => {
        const fechaActual = new Date();
        const anoActual = parseInt(fechaActual.getFullYear());
        const mesActual = parseInt(fechaActual.getMonth()) + 1;
        const diaActual = parseInt(fechaActual.getDate());

        const anoNacimiento = parseInt(String(date).substring(0, 4));
        const mesNacimiento = parseInt(String(date).substring(5, 7));
        const diaNacimiento = parseInt(String(date).substring(8, 10));
        let edad = anoActual - anoNacimiento;
        if (mesActual < mesNacimiento) {
            edad--;
        } else if (mesActual === mesNacimiento) {
            if (diaActual < diaNacimiento) {
                edad--;
            }
        }

        return edad;
    };

    window.addEventListener('load', function () {
        let ocultarDivDatosRepresentante = document.getElementById("datos_representante");
        ocultarDivDatosRepresentante.style.display = "none";

        // Agregar una condición para validar la edad
        if (parseInt(calcular(edad.value)) < 12) {
            alert("Lo siento, solo se permiten aspirantes de 12 años o más.");
        }

        date.addEventListener('change', function () {
            if (this.value) {
                edad.value = calcular(this.value);
                console.log(edad.value);

                // Ocultar o mostrar el elemento con ID datos_representante según la edad
                const datosRepresentante = document.getElementById("datos_representante");
                if (parseInt(edad.value) < 18) {
                    datosRepresentante.style.display = "block";
                } else {
                    datosRepresentante.style.display = "none";
                }
            }
        });
    });

    date.dispatchEvent(new Event('change'));

    const selectElement = document.getElementById("muni");
    const infoElement = document.getElementById("info");

    selectElement.addEventListener("change", function() {
        const selectedCourse = selectElement.value;

        if (selectedCourse !== "") {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "./ajax_adm.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    infoElement.textContent = xhr.responseText;
                }
            };
            xhr.send("registro=true&curso=" + selectedCourse);
        } else {
            infoElement.textContent = "";
        }
    });
   
    function cargarMunicipios() {
    const estadoSelect = document.getElementById("estado");
    const municipioSelect = document.getElementById("municipio");

    const selectedEstado = estadoSelect.value;

    // Realizar la solicitud AJAX para obtener los municipios
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax_adm.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const municipios = JSON.parse(xhr.responseText);

            // Limpiar y actualizar el selector de municipios
            municipioSelect.innerHTML = "<option value='' disabled selected>Selecciona un Municipio</option>";
            municipios.forEach(function(municipio) {
                municipioSelect.innerHTML += "<option value='" + municipio.id + "'>" + municipio.nombre + "</option>";
            });
        }
    };
    xhr.send("estado=" + selectedEstado);
}

function cargarParroquia() {
    const municipioSelect = document.getElementById("municipio");
    const parroquiaSelect = document.getElementById("parroquia");

    const selectedMunicipio = municipioSelect.value;

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax_adm.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const parroquias = JSON.parse(xhr.responseText);

            // Limpiar y actualizar el selector de parroquias
            parroquiaSelect.innerHTML = "<option value='' disabled selected>Selecciona una Parroquia</option>";
            parroquias.forEach(function(parroquia) {
                parroquiaSelect.innerHTML += "<option value='" + parroquia.id + "'>" + parroquia.nombre + "</option>";
            });
        }
    };
    xhr.send("municipio=" + selectedMunicipio);
}

    </script>