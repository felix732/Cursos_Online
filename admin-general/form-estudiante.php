<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Estudiante</title>
    <link rel="stylesheet" href="style-adm/form-estudiante.css">
</head>

<body>
    <header id="header" class="header">
        <div class="logo">
            <a href="adm-general.html"><img src="adm-interna/adm-img/FC.png" alt="logo institucional"></a>
        </div>
        <!-- MENU header -->
        <nav>
            <ul class="nav-links">
                <li><a href="adm-curso.html">Panel Control</a></li>
                <li><a href="adm-estudiante.php">Panel Estudiante</a></li>
                <li><a href="">Configuracion</a></li>
                <li><a href="./cerrar_sesion.php">Cerrar Sesion</a></li>
            </ul>
        </nav>

    </header>
    <center>

        <div class="contenido-estud">

            <form name="persona" action="../admin_php/envio_reg.php" method="post">
                <section class="form-register">
                    <table align="center">

                        <h2 align="center" class="titulo">REGISTRO DE PERSONAS</h2>
                        <tr>
                            <td><input class="controls" type="text" name="cedula" placeholder="cedula" maxlength="10" required></td>
                        </tr>
                        <tr>
                            <td><input class="controls" type="text" name="nombre" placeholder="nombre" maxlength="250" required></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="seg_nombre" id="" placeholder="Segundo Nombre"></td>
                        </tr>
                        <tr>
                            <td><input class="controls" type="text" name="apellido" placeholder="Apellido" maxlength="250" required></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="seg_apellido" id="" placeholder="Segundo Apellido"></td>
                        </tr>
                        <tr>
                            <td><input class="controls" type="text" name="telefono" placeholder="numero de Telefono" maxlength="11" required></td>
                        </tr>
                        <tr>
                            <td><input type="email" name="correo" id="correo" placeholder="correo" required></td>
                        </tr>
                        <tr class="sexos1">
                            <td>
                                <h2>SEXO :<input class="sexos" type="radio" name="sexo" value="M">M
                                    <input class="sexos" type="radio" name="sexo" value="F"> F</h2>
                            </td>
                        </tr>
                        <tr>
                            <div class="conteudo">
                                <td class="fech-nac">
                                    <h2>Fecha de Nacimiento </h2><input type="date" name="fecha_nac" id="" class="select"></td>
                            </div>
                        </tr>
                        <tr>
                            <td><input type="text" name="edad" id="edad" placeholder="edad"></td>
                        </tr>
                        <tr>
                            <td><select name="estado" id="">
			<option value="">Estado</option>
			<option value="yaracuy">yaracuy</option>
		</select></td>
                        </tr>
                        <tr>
                            <td><select name="municipio" id="">
			<option value="">Municipio</option>
			<option value="san_felipe">San Felipe</option>
			<option value="independencia">independencia</option>
		</select></td>
                        </tr>
                        <tr>
                            <td><select name="parroquia" id="">
			<option value="">parroquia</option>
			<option value="cm_sanfelipe">San Felipe</option>
			<option value="albarico">Albarico</option>
			<option value="salom">salom</option>
			<option value="temerla">temerla</option>
		</select></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="direccion" id="" placeholder="Calle,avenida,comunidad"></td>
                        </tr>
                        <td>
                            <select name="curso" id="">
			<option value="">Curso</option>
        	<option value="robotica">Robotica</option>
        	<option value="ingles">ingles</option>
        	<option value="frances">frances</option>
        	<option value="portugues">portugues</option>
        	<option value="aleman">aleman</option>
        	<option value="ruso">ruso</option>
        	<option value="coreano">coreano</option>
        	<option value="informatica">informatica</option>
        </select>
                        </td>
                        <tr class="centrado">
                            <td class="centrar"><input type="submit" name="registro" value="REGISTRAR AHORA" class="input-envio"></td>
                        </tr>
                        <tr class="centrado">
                            <td class="centrar">
                                <a href="adm-estudiante.php"><input type="button" name="registro" value="volver atras" class="input-envio"></a>
                            </td>
                        </tr>
                </section>
        </div>
    </center>



</body>

</html>