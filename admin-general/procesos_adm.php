<?php
	include './conexion.php'; 
	$query="SELECT * FROM estudiante";
    $queryy="SELECT * FROM facilitador";
	$resultadoQuery=$connection->query($query);
    $resultadoQueryy=$connection->query($queryy);
	$row_cnt = mysqli_num_rows($resultadoQuery);

?>



<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Procesos</title>
	<link rel="stylesheet" href="style-adm/adm-curso.css">
	<link rel="stylesheet" type="text/css" href="style-adm/adm-profesor.css">
</head>
<body>
	<header id="header" class="header">
		<div class="logo">
			<a href="adm-general.html"><img src="adm-interna/adm-img/FC.png" alt="logo institucional"></a>
		</div>
			<!-- MENU header -->
		<nav>
			<ul class="nav-links">
				<li><a href="adm-general.html">Panel Control</a></li>
				<li><a href="">Configuracion</a></li>
				<li><a href="">Cerrar Sesion</a></li>
			</ul>
		</nav>
	</header>

	<!--Barra verde -->
<div class="barra-inferior">
	<center><h1>Procesos de la Bases de Datos</h1></center>
</div>


<center>
	<!-- Tabla de Inscritos -->
    <h1>Estudiantes</h1>
		<table class="tabla-profe">
			<tr class="membrete-tabla">
				<td>Id|</td>
				<td>Cedula|</td>
				<td>Nombre|</td>
                <td>Segundo Nombre|</td>
				<td>Apellido|</td>
                <td>Segundo Apellido|</td>
				<td>Telefono|</td>
                <td>Fecha Nacimiento|</td>
                <td>Edad|</td>
				<td>Curso|</td>
				<td>Sexo|</td>
				<td>Correo</td>
                <td>Estado|</td>
                <td>Municipio|</td>
                <td>Parroquia|</td>
                <td>Direccion|</td>
                <td>Fecha de Incripcion|</td>
			</tr>
			<?php
			while ($row=$resultadoQuery->fetch_assoc()) {
				?>
			
			<tr>
				<td><?php echo $row['id']?>|</td>
				<td><?php echo $row['cedula']?>|</td>
				<td><?php echo $row['nombre']?>|</td>
                <td><?php echo $row['seg_nombre']?>|</td>
				<td><?php echo $row['apellido']?>|</td>
                <td><?php echo $row['seg_apellido']?>|</td>
				<td><?php echo $row['telefono']?>|</td>
                <td><?php echo $row['fecha_nac']?>|</td>
                <td><?php echo $row['edad']?>|</td>
				<td><?php echo $row['curso']?>|</td>
				<td><?php echo $row['sexo']?>|</td>
				<td><?php echo $row['correo']?>|</td>
                <td><?php echo $row['estado']?>|</td>
                <td><?php echo $row['municipio']?>|</td>
                <td><?php echo $row['parroquia']?>|</td>
                <td><?php echo $row['direccion']?>|</td>
                <td><?php echo $row['fecha']?>|</td>
			</tr>
		<?php
			}
			?>
		</table>
		<table class="tabla-profe">
			<tr class="membrete-tabla"><br><br>
                <h1>Facilitadores</h1>
				<td>Id|</td>
				<td>Cedula|</td>
				<td>Nombre|</td>
				<td>Apellido|</td>
				<td>Telefono|</td>
				<td>Curso Asignado|</td>
				<td>Sexo|</td>
				<td>Direccion|</td>
				<td>Correo</td>
			</tr>
			<?php
			while ($row=$resultadoQueryy->fetch_assoc()) {
				?>
			
			<tr>
				<td><?php echo $row['id']?>|</td>
				<td><?php echo $row['cedula']?>|</td>
				<td><?php echo $row['nombre']?>|</td>
				<td><?php echo $row['apellido']?>|</td>
				<td><?php echo $row['telefono']?>|</td>
				<td><?php echo $row['curso_que_imparte']?>|</td>
				<td><?php echo $row['sexo']?>|</td>
				<td><?php echo $row['direccion']?>|</td>
				<td><?php echo $row['correo']?>|</td>
			</tr>
		<?php
			}
			?>
		</table>
</center>
</body>
</html>