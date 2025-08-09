<div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Agregar Facilitador</h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="../admin-general/enviofacilitador.php" method="POST" enctype="multipart/form-data" autocomplete="off">

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
                                <input type="text" id="nombre" name="nombre" class="form-control" required>

                            </div>
                            
                        </div>


                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Apellido</label>
                                <input type="text" id="apellido" name="apellido" class="form-control" required>
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
                        </div>
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Curso</label><br>
                                <select name="curso" autocomplete="off" class="r-e">
                            <?php
                                $queryy=mysqli_query($connection,"SELECT * FROM curso");
                                while ($datos = mysqli_fetch_array($queryy))
                                    {
                    
                                    ?>
                                    <option value="<?php echo $datos['id_curso']?>"><?php echo $datos['nombre_curso']?> - <?php echo $datos['id_curso']?></option>
                                    <?php
                                         }
                                        ?>
                                </select>

                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Segundo Curso</label><br>
                                <select name="seg_curso" autocomplete="off" class="r-e">
                            <?php
                                $queryy=mysqli_query($connection,"SELECT * FROM curso");
                                while ($datos = mysqli_fetch_array($queryy))
                                    {
                    
                                    ?>
                                    <option value="<?php echo $datos['id_curso']?>"><?php echo $datos['nombre_curso']?> - <?php echo $datos['id_curso']?></option>
                                    <?php
                                         }
                                        ?>
                                </select>

                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Sexo</label><br>
                                <input type="radio" name="sexo" value="F" checked>F
                                <input type="radio" name="sexo" value="M">M

                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Direccion</label>
                                <input type="text" id="direc" name="direccion" class="form-control" required>

                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Correo</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                                            
                            </div>

                    <div class="col-12">
                        <label for="yourPassword" class="form-label">Curriculum (WORD & PDF)</label>
                        <input type="file" name="archivo" id="archivo" class="form-control" required>

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

    const calcularEdad = (fechaNacimiento) => {
        const fechaActual = new Date();
        const fechaNac = new Date(fechaNacimiento);
        const edadMilisegundos = fechaActual - fechaNac;

        const edadAnios = Math.floor(edadMilisegundos / 31536000000);

        return edadAnios;
    };

    date.addEventListener('change', function () {
        if (this.value) {
            const edadCalculada = calcularEdad(this.value);
            edad.value = edadCalculada;
        }
    });

    date.dispatchEvent(new Event('change'));
    </script>