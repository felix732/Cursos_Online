<?php
	include './conexion.php';
	$sql="SELECT * FROM facilitadores";
    $resultado=$connection->query($sql);
    $row_cnt = mysqli_num_rows($resultado);

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" href="estilos-facilitador/tabla-facilitador.css">
	<title>FACILITADORES</title>




		<script type="text/javascript">
		function cerrar(){
			swal({
  	title: "¡Cuidado!",
  	text: "¿Seguro que Quieres Salir?",
 	 icon: "warning",
  	button: "Quiero Salir!",
		});
		}
	</script>




</head>
<body>
	<header id="header" class="header">
		<div class="logo">
			<a href="adm-general.html"><img src="adm-interna/adm-img/FC.png" alt="logo institucional"></a>
		</div>
			<!-- MENU header -->
		<nav>
			<ul class="nav-links">
				<li><a href="form-facilitador.html">Inscribir Facilitador</a></li>
				<li><button type="button" class="btn btn-warning" onclick="cerrar()">Cerrar Sesion</button></li>
			</ul>
		</nav>
	</header>
	<div class="cont-general">

		<center>
		<div class="titulo">
			<h2>Facilitadores Inscritos Actualmente</h2>
		</div>
		</center>





		<div class="tabla">


			<div class="buscador">
				<center>
				<label for="cedula">
				<div class="input-group mb-3">
  <button class="btn btn-outline-secondary" type="button" id="button-addon1">Buscar</button>
  <input type="text" maxlength="8" class="form-control" placeholder="Cedula" aria-label="Example text with button addon" aria-describedby="button-addon1">
</div>
				</label>

				<br><br>
				<label for="estados"> Seleccione el estado <br>
				<select class="form-select" aria-label="Default select example">
  <option selected>Estado</option>
  <option value="1">Yaracuy</option>

				</select>
				</label>


				<label for="estados"> Seleccione el Municipio <br>
				<select class="form-select" aria-label="Default select example">
  <option selected>Estado</option>
  <option value="1">Yaracuy</option>

				</select>
				</label>


				<label for="estados"> Seleccione La Parroquia <br>
				<select class="form-select" aria-label="Default select example">
  <option selected>Parroquia</option>
  <option value="1">Albarico</option>

				</select>
				</label>

				</center>
			</div>

		</div>

		<div class="facilitadores">
			<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Cedula</th>
      <th scope="col">Nombres</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Telefono</th>
      <th scope="col">Fecha Nac.</th>
      <th scope="col">Edad</th>
      <th scope="col">Sexo</th>
      <th scope="col">Correo</th>
      <th scope="col">Curso</th>
      <th scope="col">Curriculum</th>
      <th scope="col">Foto Cedula</th>
      <th scope="col">Direccion</th>
      <th scope="col">Estado</th>
      <th scope="col">Municipio</th>
      <th scope="col">Parroquia</th>
      <th scope="col">Acciones</th>

    </tr>
  </thead>
  <tbody>
	<?php
			while ($row=$resultado->fetch_assoc()) {
            ?>
    <tr>
      <th scope="row"><?php echo $row['id'];?></th>
      <td><?php echo $row['cedula'];?></td>
      <td><?php echo $row['nombres'];?></td>
      <td><?php echo $row['apellidos'];?></td>
       <td><?php echo $row['telefono'];?></td>
      <td><?php echo $row['fecha_nac'];?></td>
      <td><?php echo $row['edad'];?></td>
       <td><?php echo $row['sexo'];?></td>
      <td><?php echo $row['correo'];?></td>
      <td><?php echo $row['curso'];?></td>
      <td><a href="<?php echo $row['sintesis_curricular'];?>">Descargar</a></td>
       <td><a href="<?php echo $row['escaneo_cedula'];?>">Descargar</a></td>
      <td><?php echo $row['direccion'];?></td>
      <td><?php echo $row['estado'];?></td>
       <td><?php echo $row['municipio'];?></td>
       <td><?php echo $row['parroquia'];?></td>
       <td class="botones">
       	<button type="button" class="btn btn-sm btn-info">Editar</button>
       	<button type="button" class="btn btn-sm btn-danger">Eliminar</button>
       </td>
    </tr>
	<?php
        }
        ?>
  </tbody>
</table>
		</div>



	</div>
</body>
</html>