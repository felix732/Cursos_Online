<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiantes</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

    <!-- jQuery 3.x CDN -->
    <script src="../admin-general/js/jquery.min.js"></script>



    <script src="../admin-general/js/bootstrap.min.js"></script>
</head>

<body>
    <br>

    <div class="container">
        <div class="col-sm-12">
            <h2 style="text-align: center;">Estudiantes Registrados</h2>
            <br>
            <div>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar"> Agregar </button>
            </div>
            <br>
            <br>
            <br>


            <div class="container">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Id</th>
				        <th>Cedula</th>
				        <th>Nombre</th>
                        <th>Seg. Nombre</th>
				        <th>Apellido</th>
				        <th>Seg. Apellido</th>
				        <th>Telefono</th>
				        <th>Sexo</th>
				        <th>Usuario</th>
                        <th>CLave</th>
                        <th>Email</th>
				        <th>Fech.Nac</th>
				        <th>Edad</th>
				        <th>Estado</th>
				        <th>municipio</th>
				        <th>parroquia</th>
				        <th>Direccion</th>
				        <th>Curso</th>
				        <th>ID Rol</th>
                        <th>C. Repre</th>
                        <th>N. Repre</th>
                        <th>A. Repre</th>
				        <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once("../admin-general/conexion_adm.php");
                        $result = mysqli_query($connection, "SELECT * FROM persona");
                        while ($fila = mysqli_fetch_assoc($result)) :
                        ?>
                            <tr>
                            <td><?php echo $fila['id']?></td>
					        <td><?php echo $fila['cedula']?></td>
					        <td><?php echo $fila['nombre']?></td>
					        <td><<?php echo $fila['seg_nombre']?></td>
					        <td><<?php echo $fila['apellido']?></td>
					        <td><?php echo $fila['seg_apellido']?></td>
					        <td><?php echo $fila['telefono']?></td>
					        <td><?php echo $fila['sexo']?></td>
                            <td><?php echo $fila['usuario']?></td>
                            <td><?php echo $fila['clave']?></td>
                            <td><?php echo $fila ['correo']?></td>
					        <td><?php echo $fila['fecha_nac']?></td>
					        <td><?php echo $fila['edad']?></td>
					        <td><?php echo $fila['estado']?></td>
					        <td><?php echo $fila['municipio']?></td>
					        <td><?php echo $fila ['parroquia']?></td>
					        <td><?php echo $fila['direccion']?></td>
					        <td><?php echo $fila ['curso']?></td>
					        <td><?php echo $fila ['id_rol']?></td>
                            <td><?php echo $fila ['cedula_rep']?></td>
                            <td><?php echo $fila ['nombre_rep']?></td>
                            <td><?php echo $fila ['apellido_rep']?></td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editar<?php echo $fila['id']; ?>">
                                        <i class="fa fa-edit "></i>
                                    </button>

                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $fila['id']; ?>">
                                        <i class="fa fa-trash "></i>
                                    </button>


                                </td>

                            </tr>
                            <?php include "editar-facilitador.php"; ?>
                            <?php include "borrar_facilitador.php"; ?>
                            
                        <?php endwhile; ?>
                    </tbody>
                </table>

            </div>
        </div>
        <center><a href="adm-curso.html" class="btn btn-primary">Atrás</a></center>


</body>
<style>
    a {
        text-decoration: none;
    }

    .s {
        padding-top: 50px;
        text-align: center;
    }
</style>

<?php include "agregar_estudiante.php"; ?>

</html>