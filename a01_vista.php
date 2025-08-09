<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: iniciar_sesion.php");
    exit();
}

include_once './conexion.php';
$sql = "SELECT * FROM planificacion WHERE statuss IN ('Activo', 'no_activo', 'en_curso')";
$resultadoCursos = $connection->query($sql);
$row_cnt = mysqli_num_rows($resultadoCursos);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Felix DEV | Mis Cursos</title>
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
            --gradient-bg: linear-gradient(135deg, #87CEEB 0%, #98FB98 100%);
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
            background: var(--gradient-bg);
            color: var(--dark-color);
            min-height: 100vh;
        }
        
        /* Header Styles */
        .header {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            height: var(--nav-height);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 5%;
            position: sticky;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(8px);
        }
        
        .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
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
            background-color: rgba(248, 249, 250, 0.8);
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 500;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }
        
        .welcome-message strong {
            color: var(--primary-color);
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
        }
        
        /* Main Content */
        .main-container {
            padding: calc(var(--nav-height) + 30px) 5% 60px;
            max-width: 1400px;
            margin: 0 auto;
        }
        
        /* Slider Styles */
        .slider {
            width: 100%;
            height: 300px;
            overflow: hidden;
            position: relative;
            margin: 0 auto 30px;
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
            margin: 30px auto;
            box-shadow: var(--card-shadow);
            max-width: 1200px;
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
            font-family: 'Montserrat', sans-serif;
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
        .courses-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            margin: 0 auto 50px;
            max-width: 1200px;
        }
        
        .course-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }
        
        .course-image {
            height: 180px;
            overflow: hidden;
        }
        
        .course-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .course-card:hover .course-image img {
            transform: scale(1.05);
        }
        
        .course-content {
            padding: 20px;
        }
        
        .course-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.3rem;
            margin-bottom: 10px;
            color: var(--dark-color);
        }
        
        .course-meta {
            margin-bottom: 15px;
        }
        
        .course-status {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            margin-bottom: 10px;
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
        
        .course-dates {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 10px;
        }
        
        .course-seats {
            color: var(--dark-color);
            font-weight: 500;
            margin-bottom: 15px;
        }
        
        .btn-view {
            width: 100%;
            padding: 10px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-view:hover {
            background: linear-gradient(to right, var(--secondary-color), var(--primary-color));
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.4);
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
        .footer {
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
            
            .courses-container {
                grid-template-columns: 1fr;
                padding: 0 20px;
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <a href="a01_vista.php" class="logo">
            <img src="img/felix_dev.jpg" alt="Felix DEV">
            <span class="logo-text">FELIX <span>DEV</span></span>
        </a>
        
        <div class="user-nav">
            <div class="welcome-message">
                Bienvenido, <strong><?php echo $_SESSION['usuario']; ?></strong>
            </div>
            <a href="cerrar_sesion.php" class="btn-logout">
                <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
            </a>
        </div>
    </header>

    <div class="main-container">
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
                <li><a href="./cursos_inscritos.php">MIS CURSOS</a></li>
            </ul>
        </div>

        <div class="bib_title">
            <h1>BIBLIOTECA DE CURSOS</h1>
        </div>

        <div class="courses-container">
            <?php while ($row = $resultadoCursos->fetch_assoc()): 
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
                <div class="course-card">
                    <div class="course-image">
                        <img src="./img/felix_dev.jpg" alt="<?php echo $fila['nombre_curso']; ?>">
                    </div>
                    <div class="course-content">
                        <h3 class="course-title"><?php echo $fila['nombre_curso']; ?></h3>
                        
                        <div class="course-meta">
                            <span class="course-status <?php echo $status_class; ?>">
                                <?php echo $estado_curso; ?>
                            </span>
                        </div>
                        
                        <p class="course-dates">
                            <?php echo date('d/m/Y', strtotime($row['fecha_inicio'])); ?> - 
                            <?php echo date('d/m/Y', strtotime($row['fecha_cierre'])); ?>
                        </p>
                        
                        <p class="course-seats">
                            Cupos disponibles: <?php echo $row['cupo']; ?>
                        </p>
                        
                        <?php if ($estado_curso == "no_activo"): ?>
                            <div class="alert-danger">
                                Este curso está inactivo<br>
                                Razón: <?php echo $row['razon']; ?>
                            </div>
                        <?php elseif ($row['cupo'] <= 0): ?>
                            <div class="alert-danger">
                                Lo sentimos, no hay cupos disponibles
                            </div>
                        <?php else: ?>
                            <form method="POST" action="./curso_vista_login.php">
                                <input type="hidden" name="curso" value="<?php echo $curso; ?>">
                                <input type="hidden" name="plani" value="<?php echo $row['id_plani']; ?>">
                                <button type="submit" class="btn-view">
                                    <i class="fas fa-eye"></i> Ver más
                                </button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <div class="footer">
        <p>Desarrollado por Estudiantes de la UPTYAB</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Efecto de carga suave para las tarjetas
        $(document).ready(function() {
            $('.course-card').each(function(i) {
                $(this).delay(i * 100).animate({opacity: 1}, 200);
            });
        });
    </script>
</body>
</html>