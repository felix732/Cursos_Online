<?php
	include './conexion.php'; 
	$query="SELECT * FROM facilitador"; 
	
	$queryy=mysqli_query($connection,"SELECT * FROM cursos");
	$resultadoQuery=$connection->query($query);
	$row_cnt = mysqli_num_rows($resultadoQuery);

?>


<!DOCTYPE html>
<html lang="es">
<head>
	 <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style-adm/form-docente.css">
        <link rel="shortcut icon" href="">
	<title>Formulario Docente</title>
</head>
<header id="header" class="header">
		<div class="logo">
			<a href="adm-general.html"><img src="adm-interna/adm-img/FC.png" alt="logo institucional"></a>
		</div>
			<!-- MENU header -->
		<nav>
			<ul class="nav-links">
				<li><a href="adm-profesor.php">Panel Profesor</a></li>
				<li><a href="">Configuracion</a></li>
				<li><a href="">Cerrar Sesion</a></li>
			</ul>
		</nav>
	</header>

<body>


<center>

<div class="contenido-profe">

<form name="docente" action="enviofacilitador.php" method="post">
	<section class="form-register">
<table align="center">

	<h2 align="center" class="titulo">REGISTRO DE DOCENTES</h2>
	<tr>
		<td><input class="controls" type="text" name="cedula" placeholder="cedula" maxlength="14" required></td>
	</tr>
	<tr>
		<td><input class="controls" type="text" name="nombre" placeholder="nombre" maxlength="100" required></td>
	</tr>
		<tr>
		<td><input class="controls" type="text" name="apellido" placeholder="Apellido" maxlength="100" required></td>
	</tr>
	<tr>
		<td><input class="controls" type="number" name="telefono" placeholder="numero de Telefono" maxlength="12" required></td>
	</tr>
	<tr class="sexos1">
		<td><h2>SEXO   :<input class="sexos" type="radio" name="sexo" value="M">M
		<input class="sexos" type="radio" name="sexo" value="F"> F</h2></td>
	</tr>
		<tr>
		<td><input class="controls" type="text" name="direccion" placeholder="Direccion" maxlength="200" required></td>
	</tr>
	<tr>
		<td><input class="controls" type="text" name="correo" placeholder="Correo" maxlength="100" required></td>
	</tr>
 <tr>
	<td><select name="cursos" autocomplete="off" class="r-e">
		<?php
		while ($datos = mysqli_fetch_array($queryy))
		{
		
		?>
		<option value="<?php echo $datos['cursos']?>"><?php echo $datos['cursos']?></option>
		<?php
		}
		?></td>
	</select>
 </tr>
        <tr class="centrado">
           <td class="centrar"><input type="submit" name="registro" value="REGISTRAR AHORA" class="input-envio"></td>
    </tr>
    </section>
 </div>
</center>
</form>
</body>
</html>