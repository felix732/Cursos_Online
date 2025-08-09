<?php
session_start();
include_once 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FDC | Registro de Facilitador</title>
    <link rel="shortcut icon" href="img/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3a0ca3;
            --accent-color: #4cc9f0;
            --light-color: #f8f9fa;
            --dark-color: #2b2d42;
            --success-color: #38b000;
            --warning-color: #ffaa00;
            --danger-color: #ef233c;
            --text-color: #4a4a4a;
            --text-light: #6c757d;
            --bg-gradient: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            --card-shadow: 0 12px 24px -6px rgba(0, 0, 0, 0.1);
            --nav-height: 70px;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: var(--bg-gradient);
            color: var(--text-color);
            line-height: 1.6;
            min-height: 100vh;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            color: var(--dark-color);
        }
        
        /* Header Styles */
        .header {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            position: sticky;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            height: var(--nav-height);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 5%;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }
        
        .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
        }
        
        .logo img {
            height: 40px;
            margin-right: 12px;
            transition: transform 0.3s ease;
        }
        
        .logo:hover img {
            transform: scale(1.1);
        }
        
        .logo-text {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 1.3rem;
            color: var(--primary-color);
        }
        
        .logo-text span {
            color: var(--secondary-color);
        }
        
        .nav-links {
            display: flex;
            list-style: none;
            align-items: center;
        }
        
        .nav-links li {
            margin-left: 25px;
        }
        
        .nav-links a {
            color: var(--dark-color);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }
        
        .nav-links a:hover {
            color: var(--primary-color);
        }
        
        .btn-nav {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white !important;
            padding: 8px 20px;
            border-radius: 30px;
            font-weight: 500;
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.25);
        }
        
        .btn-nav:hover {
            background: linear-gradient(to right, var(--secondary-color), var(--primary-color));
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(67, 97, 238, 0.35);
        }
        
        /* Main Content */
        .registration-container {
            display: flex;
            min-height: calc(100vh - var(--nav-height));
            padding: 40px 5%;
            max-width: 1400px;
            margin: 0 auto;
        }
        
        .registration-form {
            flex: 1;
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: var(--card-shadow);
            margin-right: 40px;
            animation: fadeInUp 0.6s ease;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .registration-image {
            flex: 1;
            background: url('facilitador.png') center/cover no-repeat;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            display: none;
            position: relative;
        }
        
        .registration-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, rgba(67, 97, 238, 0.2), rgba(58, 12, 163, 0.4));
            border-radius: 20px;
        }
        
        .form-title {
            text-align: center;
            margin-bottom: 30px;
            position: relative;
        }
        
        .form-title h2 {
            font-size: 2rem;
            margin-bottom: 15px;
        }
        
        .form-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
            border-radius: 2px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .form-col {
            flex: 1;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark-color);
        }
        
        input, select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }
        
        input:focus, select:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        }
        
        input::placeholder {
            color: #adb5bd;
        }
        
        /* Estilo original para los radios */
        .sexos {
            display: none;
        }
        
        .sexo-label {
            display: inline-block;
            background-color: #f0f0f0;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }
        
        .sexos:checked + .sexo-label {
            background-color: var(--primary-color);
            color: #fff;
            border: 1px solid var(--primary-color);
        }
        
        .gender-selection {
            margin: 15px 0;
        }
        
        .btn-submit {
            width: 100%;
            padding: 14px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
            font-family: 'Montserrat', sans-serif;
        }
        
        .btn-submit:hover {
            background: linear-gradient(to right, var(--secondary-color), var(--primary-color));
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(67, 97, 238, 0.4);
        }
        
        .btn-back {
            display: inline-block;
            width: 100%;
            padding: 12px;
            background: white;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 15px;
            text-align: center;
            text-decoration: none;
            font-family: 'Montserrat', sans-serif;
        }
        
        .btn-back:hover {
            background: var(--primary-color);
            color: white;
        }
        
        .login-link {
            text-align: center;
            margin-top: 20px;
            color: var(--text-light);
        }
        
        .login-link a {
            color: var(--primary-color);
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .login-link a:hover {
            text-decoration: underline;
        }
        
        /* Responsive Design */
        @media (min-width: 992px) {
            .registration-image {
                display: block;
            }
        }
        
        @media (max-width: 768px) {
            .registration-container {
                flex-direction: column;
                padding: 30px 5%;
            }
            
            .registration-form {
                margin-right: 0;
                margin-bottom: 30px;
            }
            
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            
            .form-title h2 {
                font-size: 1.8rem;
            }
        }
        
        @media (max-width: 576px) {
            .header {
                padding: 0 20px;
            }
            
            .nav-links li {
                margin-left: 15px;
            }
            
            .registration-form {
                padding: 30px;
            }
            
            .form-title h2 {
                font-size: 1.6rem;
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <a href="index.php" class="logo">
            <img src="img/felix_dev.jpg" alt="FELIX DEV CURSOS">
            <span class="logo-text">FELIX <span>DEV</span></span>
        </a>
        
        <nav>
            <ul class="nav-links">
                <li><a href="iniciar_sesion.php">Iniciar Sesión</a></li>
                <li><a href="tipo-persona.html" class="btn-nav">Inscripción</a></li>
            </ul>
        </nav>
    </header>

    <main class="registration-container">
        <div class="registration-form">
            <div class="form-title">
                <h2>Registro de Facilitador</h2>
            </div>
            
            <form name="persona" id="formulario" action="./registro_envio.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" value="2" name="id_rol">
                
                <div class="form-row">
                    <div class="form-col">
                        <label for="cedula">Cédula</label>
                        <input type="text" id="cedula" name="cedula" placeholder="Ej: 1234567890" maxlength="10" required>
                    </div>
                    <div class="form-col">
                        <label for="telefono">Teléfono</label>
                        <input type="number" name="telefono" id="telefono" placeholder="Ej: 04121234567" maxlength="11" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-col">
                        <label for="nombre">Primer Nombre</label>
                        <input type="text" name="nombre" placeholder="Primer nombre" id="nombre" maxlength="60" required>
                    </div>
                    <div class="form-col">
                        <label for="segundo_nombre">Segundo Nombre</label>
                        <input type="text" name="segundo_nombre" id="segundo_nombre" placeholder="Segundo nombre (opcional)">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-col">
                        <label for="apellido">Primer Apellido</label>
                        <input type="text" id="apellido" name="apellido" placeholder="Primer apellido" maxlength="60" required>
                    </div>
                    <div class="form-col">
                        <label for="segundo_apellido">Segundo Apellido</label>
                        <input type="text" name="segundo_apellido" id="segundo_apellido" placeholder="Segundo apellido (opcional)">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-col">
                        <label for="usuario">Nombre de Usuario</label>
                        <input type="text" name="usuario" placeholder="Nombre de usuario" maxlength="60" required>
                    </div>
                    <div class="form-col">
                        <label for="clave">Contraseña</label>
                        <input type="password" name="clave" placeholder="Contraseña segura" maxlength="60" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="correo">Correo Electrónico</label>
                    <input type="email" name="correo" placeholder="Ej: usuario@dominio.com" maxlength="100" required>
                </div>
                
                <div class="form-group">
                    <label>Sexo</label>
                    <div class="gender-selection">
                        <input class="sexos" type="radio" name="sexo" value="M" id="radioM">
                        <label class="sexo-label" for="radioM">Masculino</label>
                        
                        <input class="sexos" type="radio" name="sexo" value="F" id="radioF" checked>
                        <label class="sexo-label" for="radioF">Femenino</label>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-col">
                        <label for="date">Fecha de Nacimiento</label>
                        <input type="date" name="fecha_nac" id="date" class="nacido">
                    </div>
                    <div class="form-col">
                        <label for="edad">Edad</label>
                        <input type="text" id="edad" name="edad" readonly placeholder="Se calculará automáticamente">
                    </div>
                </div>
                
                <div class="form-title" style="margin: 30px 0 20px;">
                    <h2 style="font-size: 1.5rem;">Dirección</h2>
                </div>
                
                <div class="form-group">
                    <label for="estado">Estado</label>
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
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="municipio">Municipio</label>
                    <select name="municipio" id="municipio" autocomplete="off" class="direct" onchange="cargarParroquia()">
                        <option value="" disabled selected>Selecciona un Municipio</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="parroquia">Parroquia</label>
                    <select class="direct" name="parroquia" id="parroquia" onchange="obtenerIdParroquia()">
                        <option value="" disabled selected>Selecciona una Parroquia</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="direccion">Dirección Exacta</label>
                    <input type="text" name="direccion" placeholder="Calle, avenida, comunidad" maxlength="200" required>
                </div>
                
                <input type="hidden" id="cedula" value="" name="cedula_rep">
                <input type="hidden" value="" name="nombre_rep" id="nombre">
                <input type="hidden" value="" id="apellido" name="apellido_rep">
                <input type="hidden" name="fecha_registro" value="<?php echo date("Y-m-d H:i:s"); ?>">
                
                <button type="submit" name="registro" class="btn-submit">REGISTRARME AHORA</button>
                <a href="tipo-persona.html" class="btn-back">VOLVER ATRÁS</a>
                
                <div class="login-link">
                    ¿Ya tienes una cuenta? <a href="./iniciar_sesion.php">Inicia sesión aquí</a>
                </div>
            </form>
        </div>
        
        <div class="registration-image"></div>
    </main>

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
                edad.value = edadCalculada + " años";
            }
        });

        date.dispatchEvent(new Event('change'));

        function cargarMunicipios() {
            const estadoSelect = document.getElementById("estado");
            const municipioSelect = document.getElementById("municipio");

            const selectedEstado = estadoSelect.value;

            // Realizar la solicitud AJAX para obtener los municipios
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "registro_ajax.php", true);
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

            // Realizar la solicitud AJAX para obtener las parroquias
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "registro_ajax.php", true);
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
</body>
</html>