<?php
session_start();
include './conexion_faci.php';
$sql = "SELECT * FROM planificacion WHERE statuss IN ('Activo', 'no_activo', 'en_curso')";
$resultadoCursos = $connection->query($sql);
$row_cnt = mysqli_num_rows($resultadoCursos);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Felix_DEV | Cursos & Certificados</title>
    <link rel="shortcut icon" href="img/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            cursor: pointer;
        }
        
        .logo img {
            height: 40px;
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
            margin-left: 12px;
        }
        
        .logo-text span {
            color: var(--secondary-color);
        }
        
        .user-nav {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .welcome-message {
            font-weight: 500;
            color: var(--dark-color);
            background-color: rgba(248, 249, 250, 0.8);
            padding: 8px 16px;
            border-radius: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }
        
        .welcome-message strong {
            color: var(--primary-color);
        }
        
        .btn-nav {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 8px 20px;
            border-radius: 30px;
            font-weight: 500;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.25);
        }
        
        .btn-nav:hover {
            background: linear-gradient(to right, var(--secondary-color), var(--primary-color));
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(67, 97, 238, 0.35);
            color: white;
        }
        
        .btn-logout {
            background: var(--danger-color);
            color: white;
            padding: 8px 20px;
            border-radius: 30px;
            font-weight: 500;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }
        
        .btn-logout:hover {
            background: #d90429;
            transform: translateY(-2px);
            color: white;
        }
        
        /* Slider Styles */
        .slider {
            width: 100%;
            height: 300px;
            overflow: hidden;
            position: relative;
            margin-top: 20px;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
        }
        
        .slider ul {
            display: flex;
            width: 400%;
            height: 100%;
            animation: slide 20s infinite alternate ease-in-out;
        }
        
        .slider li {
            width: 100%;
            list-style: none;
        }
        
        .slider img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        @keyframes slide {
            0% { margin-left: 0; }
            20% { margin-left: 0; }
            
            25% { margin-left: -100%; }
            45% { margin-left: -100%; }
            
            50% { margin-left: -200%; }
            70% { margin-left: -200%; }
            
            75% { margin-left: -300%; }
            100% { margin-left: -300%; }
        }
        
        /* Navigation Menu */
        .forum {
            background: white;
            border-radius: 12px;
            padding: 15px 0;
            margin: 30px 0;
            box-shadow: var(--card-shadow);
        }
        
        .forum ul {
            display: flex;
            justify-content: center;
            list-style: none;
            gap: 40px;
        }
        
        .forum a {
            color: var(--dark-color);
            text-decoration: none;
            font-weight: 500;
            font-size: 1rem;
            transition: all 0.3s ease;
            padding: 8px 16px;
            border-radius: 8px;
        }
        
        .forum a:hover {
            color: var(--primary-color);
            background: rgba(67, 97, 238, 0.1);
        }
        
        /* Courses Title */
        .bib_title {
            text-align: center;
            margin: 40px 0;
        }
        
        .bib_title h1 {
            font-size: 2.2rem;
            position: relative;
            display: inline-block;
        }
        
        .bib_title h1::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
            border-radius: 2px;
        }
        
        /* Courses Grid */
        .container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            padding: 0 5%;
            margin-bottom: 50px;
        }
        
        .card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }
        
        .card figure {
            height: 180px;
            overflow: hidden;
        }
        
        .card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .card:hover img {
            transform: scale(1.05);
        }
        
        .contenido {
            padding: 20px;
        }
        
        .contenido h4 {
            font-size: 1.3rem;
            margin-bottom: 10px;
            color: var(--dark-color);
        }
        
        .contenido p {
            margin-bottom: 15px;
            color: var(--text-light);
            font-size: 0.95rem;
        }
        
        .status {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            margin-bottom: 15px;
        }
        
        .status-active {
            background-color: var(--success-color);
            color: white;
        }
        
        .status-inactive {
            background-color: var(--danger-color);
            color: white;
        }
        
        .status-pending {
            background-color: var(--warning-color);
            color: var(--dark-color);
        }
        
        .btn-success {
            background: linear-gradient(to right, var(--success-color), #32a852);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .btn-success:hover {
            background: linear-gradient(to right, #32a852, var(--success-color));
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(56, 176, 0, 0.3);
        }
        
        .alert-danger {
            background-color: rgba(239, 35, 60, 0.1);
            color: var(--danger-color);
            padding: 10px;
            border-radius: 8px;
            border-left: 4px solid var(--danger-color);
            font-size: 0.9rem;
        }
        
        /* Footer */
        .publicidad {
            text-align: center;
            padding: 20px;
            background: var(--dark-color);
            color: white;
            font-size: 0.9rem;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                height: auto;
                padding: 15px;
            }
            
            .user-nav {
                margin-top: 15px;
                width: 100%;
                justify-content: space-between;
            }
            
            .slider {
                height: 200px;
            }
            
            .forum ul {
                flex-direction: column;
                gap: 10px;
                align-items: center;
            }
            
            .container {
                grid-template-columns: 1fr;
                padding: 0 20px;
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <a href="a01_vista_faci.php" class="logo">
            <img src="img/felix_dev.jpg" alt="FELIX DEV CURSOS">
            <span class="logo-text">FELIX <span>DEV</span></span>
        </a>
        
        <div class="user-nav">
            <div class="welcome-message">
                Bienvenido Profesor, <strong><?php echo $_SESSION['usuario']; ?></strong>
            </div>
            <a href="./curri.php" class="btn-nav">
                <i class="fas fa-file-upload"></i> Enviar Curriculum
            </a>
            <a href="../cerrar_sesion.php" class="btn-logout">
                <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
            </a>
        </div>
    </header>

    <div class="slider">
        <ul>
            <li>
                <img src="img/img01.jpg" alt="Imagen promocional 1">
            </li>
            <li>
                <img src="img/img2.jpg" alt="Imagen promocional 2">
            </li>
            <li>
                <img src="img/img3.jpg" alt="Imagen promocional 3">
            </li>
            <li>
                <img src="img/img4.jpg" alt="Imagen promocional 4">
            </li>
        </ul>
    </div>

    <div class="forum">
        <ul>
            <li><a href="#">QUIENES SOMOS</a></li>
            <li><a href="#">CONTACTOS</a></li>
            <li><a href="./cursos_inscritos_faci.php">MIS CURSOS</a></li>
        </ul>
    </div>

    <div class="bib_title">
        <h1>BIBLIOTECA DE CURSOS</h1>
    </div>

    <div class="container">
        <?php
        while ($row = $resultadoCursos->fetch_assoc()) {
            $curso = $row['curso'];
            $query2 = "SELECT * FROM curso WHERE id_curso = '$curso'";
            $resultado2 = mysqli_query($connection, $query2);
            $fila = mysqli_fetch_assoc($resultado2);
            
            // Determinar clase de estado
            $estado_curso = $row["statuss"];
            $status_class = '';
            if ($estado_curso == "Activo") {
                $status_class = 'status-active';
            } elseif ($estado_curso == "no_activo") {
                $status_class = 'status-inactive';
            } elseif ($estado_curso == "en_curso") {
                $status_class = 'status-pending';
            }
        ?>
            <div class="card">
                <figure>
                    <img src="./img/felix_dev.jpg" alt="<?php echo $fila['nombre_curso']; ?>">
                </figure>
                <div class="contenido">
                    <h4><?php echo $fila['nombre_curso']; ?></h4>
                    
                    <p class="status <?php echo $status_class; ?>">
                        Estado: <?php echo $estado_curso; ?>
                    </p>
                    
                    <?php
                    $cupos_disponibles = $row["cupo"];
                    echo "<p>Cupos disponibles: $cupos_disponibles</p>";

                    $fecha_inicio = $row["fecha_inicio"];
                    $fecha_cierre = $row["fecha_cierre"];
                    ?>
                    <p>Tiempo: <?php echo date('d/m/Y', strtotime($fecha_inicio)); ?> - <?php echo date('d/m/Y', strtotime($fecha_cierre)); ?></p>
                    
                    <?php
                    if ($estado_curso == "Activo") {
                        echo '<form method="POST" action="./curso_vista_faci.php">';
                        echo '<button type="submit" class="btn-success">Ver más</button>';
                        echo '<input type="hidden" name="curso" value="' . $curso . '">';
                        echo '<input type="hidden" name="plani" value="' . $row["id_plani"] . '">';
                        echo '</form>';
                    } elseif ($estado_curso == "no_activo") {
                        $razon_no_activo = $row["razon"];
                        echo '<div class="alert-danger">Este Curso está Inactivo<br>Razón: ' . $razon_no_activo . '</div>';
                    }
                    ?>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="publicidad">
        <p>Desarrollado por Estudiantes de la UPTYAB</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Efecto de carga suave para las tarjetas
        $(document).ready(function() {
            $('.card').each(function(i) {
                $(this).delay(i * 100).animate({opacity: 1}, 200);
            });
        });
    </script>
</body>
</html>