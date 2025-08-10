<?php
    include './conexion.php';
    $sql = "SELECT * FROM planificacion WHERE statuss IN ('Activo', 'no_activo', 'en_curso')";
    $resultadoCursos = $connection->query($sql);
    $row_cnt = mysqli_num_rows($resultadoCursos);
    
    // Obtener cursos para el texto rotativo
    $sql_cursos = "SELECT nombre_curso FROM curso";
    $result_cursos = $connection->query($sql_cursos);
    $cursos = array();
    while($row = $result_cursos->fetch_assoc()) {
        $cursos[] = $row['nombre_curso'];
    }
    $cursos_json = json_encode($cursos);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FELIX DEV CURSOS | FDC - Educación Online de Calidad</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="img/favicon.png">
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
            overflow-x: hidden;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: var(--dark-color);
        }
        
        /* Header Styles */
        .header {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            height: var(--nav-height);
            display: flex;
            align-items: center;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            padding: 0 5%;
            transition: all 0.3s ease;
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
            font-size: 1.5rem;
            color: var(--primary-color);
            letter-spacing: -0.5px;
        }
        
        .logo-text span {
            color: var(--secondary-color);
            font-weight: 800;
        }
        
        .logo-text small {
            font-size: 0.7em;
            color: var(--text-light);
            display: block;
            line-height: 1;
            margin-top: -3px;
            font-weight: 400;
        }
        
        .nav-container {
            display: flex;
            align-items: center;
            margin-left: auto;
        }
        
        .nav-links {
            display: flex;
            list-style: none;
        }
        
        .nav-links li {
            margin-left: 20px;
            position: relative;
        }
        
        .nav-links li a {
            color: var(--dark-color);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            padding: 8px 12px;
            border-radius: 6px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }
        
        .nav-links li a i {
            margin-right: 8px;
            font-size: 0.9em;
        }
        
        .nav-links li a:hover {
            color: var(--primary-color);
            background: rgba(67, 97, 238, 0.08);
        }
        
        .nav-links li a.active {
            color: var(--primary-color);
            font-weight: 600;
        }
        
        .nav-links li a.btn-nav {
            background-color: var(--primary-color);
            color: white !important;
            padding: 8px 18px;
            border-radius: 30px;
            font-weight: 500;
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.25);
        }
        
        .nav-links li a.btn-nav:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(67, 97, 238, 0.35);
        }
        
        .hamburger {
            display: none;
            cursor: pointer;
            margin-left: 20px;
        }
        
        /* Hero Section */
        .hero-section {
            padding: calc(var(--nav-height) + 40px) 5% 60px;
            display: flex;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
        }
        
        /* Slider Styles */
        .slider-container {
            flex: 1;
            padding-right: 40px;
            min-width: 0;
        }
        
        .slider {
            width: 100%;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            height: 380px;
            position: relative;
        }
        
        .slider-inner {
            width: 100%;
            height: 100%;
            position: relative;
            overflow: hidden;
        }
        
        .slider-slide {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }
        
        .slider-slide.active {
            opacity: 1;
        }
        
        .slider-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .slider-dots {
            position: absolute;
            bottom: 20px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            z-index: 10;
        }
        
        .slider-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            margin: 0 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .slider-dot.active {
            background: white;
            transform: scale(1.2);
        }
        
        /* Presentation Styles */
        .presentation {
            flex: 1;
            padding-left: 40px;
            max-width: 500px;
        }
        
        .presentation h2 {
            font-size: 2.2rem;
            margin-bottom: 20px;
            line-height: 1.2;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .presentation p {
            font-size: 1.1rem;
            color: var(--text-light);
            margin-bottom: 30px;
        }
        
        .changing-courses-container {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: var(--card-shadow);
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }
        
        .changing-courses-container:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, var(--primary-color), var(--accent-color));
        }
        
        .changing-courses-label {
            font-size: 0.9rem;
            color: var(--text-light);
            margin-bottom: 8px;
            display: block;
        }
        
        .changing-courses {
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--dark-color);
            height: 2.2rem;
            overflow: hidden;
            position: relative;
        }
        
        .course-item {
            position: absolute;
            width: 100%;
            left: 0;
            text-align: left;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .course-item.active {
            opacity: 1;
            transform: translateY(0);
        }
        
        .btn-hero {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            padding: 12px 28px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1rem;
            box-shadow: 0 6px 20px rgba(67, 97, 238, 0.3);
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            text-decoration: none;
        }
        
        .btn-hero i {
            margin-left: 8px;
            transition: transform 0.3s ease;
        }
        
        .btn-hero:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(67, 97, 238, 0.4);
        }
        
        .btn-hero:hover i {
            transform: translateX(4px);
        }
        
        /* Main Content */
        .main-content {
            padding: 0 5% 60px;
            max-width: 1400px;
            margin: 0 auto;
        }
        
        /* Title Styles */
        .section-title {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }
        
        .section-title h1 {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }
        
        .section-title .title-decoration {
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
            margin: 0 auto;
            border-radius: 2px;
        }
        
        /* Card Styles */
        .courses-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 30px;
            margin-bottom: 60px;
        }
        
        .course-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
            position: relative;
            animation: fadeInUp 0.6s ease forwards;
            opacity: 0;
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
        
        .course-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.15);
        }
        
        .course-card-image {
            height: 200px;
            overflow: hidden;
            position: relative;
        }
        
        .course-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .course-card:hover .course-card-image img {
            transform: scale(1.05);
        }
        
        .course-card-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: white;
            padding: 5px 12px;
            border-radius: 30px;
            font-size: 0.75rem;
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        
        .course-card-content {
            padding: 25px;
        }
        
        .course-card-title {
            font-size: 1.3rem;
            margin-bottom: 12px;
            color: var(--dark-color);
        }
        
        .course-card-meta {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            font-size: 0.9rem;
            color: var(--text-light);
        }
        
        .course-card-meta i {
            margin-right: 5px;
            color: var(--primary-color);
        }
        
        .course-card-status {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 30px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        .status-active {
            background-color: rgba(56, 176, 0, 0.1);
            color: var(--success-color);
        }
        
        .status-inactive {
            background-color: rgba(239, 35, 60, 0.1);
            color: var(--danger-color);
        }
        
        .status-progress {
            background-color: rgba(255, 170, 0, 0.1);
            color: var(--warning-color);
        }
        
        .course-card-button {
            display: block;
            text-align: center;
            padding: 10px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
            margin-top: 15px;
        }
        
        .btn-enroll {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
        }
        
        .btn-enroll:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(67, 97, 238, 0.4);
        }
        
        .btn-disabled {
            background: #e9ecef;
            color: var(--text-light);
            cursor: not-allowed;
        }
        
        /* Footer Styles */
        .footer {
            background-color: var(--dark-color);
            color: white;
            padding: 40px 5% 20px;
        }
        
        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
        }
        
        .footer-logo {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .footer-logo img {
            height: 40px;
            margin-right: 12px;
        }
        
        .footer-logo-text {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 1.3rem;
            color: white;
        }
        
        .footer-logo-text span {
            color: var(--accent-color);
        }
        
        .footer-about p {
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 20px;
            font-size: 0.95rem;
        }
        
        .footer-social a {
            color: white;
            font-size: 1.2rem;
            margin-right: 15px;
            transition: color 0.3s ease;
        }
        
        .footer-social a:hover {
            color: var(--accent-color);
        }
        
        .footer-links h3 {
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: white;
            position: relative;
            padding-bottom: 10px;
        }
        
        .footer-links h3:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 2px;
            background: var(--accent-color);
        }
        
        .footer-links ul {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 10px;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: color 0.3s ease;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
        }
        
        .footer-links a i {
            margin-right: 8px;
            font-size: 0.8em;
        }
        
        .footer-links a:hover {
            color: white;
        }
        
        .footer-contact p {
            display: flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 15px;
            font-size: 0.95rem;
        }
        
        .footer-contact i {
            margin-right: 10px;
            color: var(--accent-color);
            font-size: 1.1em;
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            margin-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.85rem;
        }
        
        /* Responsive Design */
        @media (max-width: 1200px) {
            .hero-section {
                flex-direction: column;
            }
            
            .slider-container, .presentation {
                width: 100%;
                padding: 0;
                max-width: 100%;
            }
            
            .slider {
                margin-bottom: 40px;
                max-width: 800px;
                margin-left: auto;
                margin-right: auto;
            }
            
            .presentation {
                text-align: center;
                max-width: 600px;
                margin: 0 auto;
            }
            
            .changing-courses {
                text-align: center;
            }
        }
        
        @media (max-width: 992px) {
            .nav-links {
                display: none;
                position: fixed;
                top: var(--nav-height);
                left: 0;
                right: 0;
                background: white;
                flex-direction: column;
                padding: 20px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                z-index: 999;
            }
            
            .nav-links.active {
                display: flex;
            }
            
            .nav-links li {
                margin: 10px 0;
            }
            
            .nav-links li a {
                padding: 12px 15px;
                font-size: 1rem;
            }
            
            .hamburger {
                display: block;
                font-size: 1.5rem;
                color: var(--dark-color);
            }
            
            .section-title h1 {
                font-size: 2rem;
            }
        }
        
        @media (max-width: 768px) {
            .header {
                padding: 0 20px;
            }
            
            .logo img {
                height: 35px;
            }
            
            .logo-text {
                font-size: 1.3rem;
            }
            
            .slider {
                height: 280px;
            }
            
            .presentation h2 {
                font-size: 1.8rem;
            }
            
            .changing-courses {
                font-size: 1.4rem;
            }
            
            .courses-container {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 576px) {
            .logo-text small {
                display: none;
            }
            
            .slider {
                height: 220px;
            }
            
            .presentation h2 {
                font-size: 1.6rem;
            }
            
            .changing-courses {
                font-size: 1.2rem;
                height: 1.8rem;
            }
            
            .changing-courses-container {
                padding: 20px;
            }
            
            .btn-hero {
                padding: 10px 20px;
                font-size: 0.9rem;
            }
        }
        
        /* Animation Delays for Cards */
        .course-card:nth-child(1) { animation-delay: 0.1s; }
        .course-card:nth-child(2) { animation-delay: 0.2s; }
        .course-card:nth-child(3) { animation-delay: 0.3s; }
        .course-card:nth-child(4) { animation-delay: 0.4s; }
        .course-card:nth-child(5) { animation-delay: 0.5s; }
        .course-card:nth-child(6) { animation-delay: 0.6s; }
    </style>
</head>

<body>
    <header class="header">
        <a href="index.html" class="logo">
            <img src="img/felix_dev.jpg" alt="FELIX DEV CURSOS">
            <div class="logo-text">FELIX <span>DEV</span> <small>CURSOS ONLINE</small></div>
        </a>
        
        <div class="nav-container">
            <nav>
                <ul class="nav-links">
                    <li><a href="#quienes-somos" class="active"><i class="fas fa-info-circle"></i> Quiénes Somos</a></li>
                    <li><a href="#contacto"><i class="fas fa-envelope"></i> Contacto</a></li>
                    <li><a href="tipo-persona.html"><i class="fas fa-book"></i> Mis Cursos</a></li>
                    <li><a href="iniciar_sesion.php"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</a></li>
                    <li><a href="tipo-persona.html" class="btn-nav"><i class="fas fa-user-plus"></i> Inscripción</a></li>
                </ul>
            </nav>
            <div class="hamburger" id="hamburger">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </header>
    
    <main>
        <section class="hero-section">
            <div class="slider-container">
                <div class="slider">
                    <div class="slider-inner">
                        <div class="slider-slide active">
                            <img src="img/img01.jpg" alt="Imagen de curso 1">
                        </div>
                        <div class="slider-slide">
                            <img src="img/img2.jpg" alt="Imagen de curso 2">
                        </div>
                        <div class="slider-slide">
                            <img src="img/img3.jpg" alt="Imagen de curso 3">
                        </div>
                        <div class="slider-slide">
                            <img src="img/img4.jpg" alt="Imagen de curso 4">
                        </div>
                    </div>
                    <div class="slider-dots">
                        <div class="slider-dot active"></div>
                        <div class="slider-dot"></div>
                        <div class="slider-dot"></div>
                        <div class="slider-dot"></div>
                    </div>
                </div>
            </div>
            
            <div class="presentation">
                <h2>Transforma tu futuro con nuestros cursos online</h2>
                <p>Accede a educación de calidad desde cualquier lugar y a tu propio ritmo.</p>
                
                <div class="changing-courses-container">
                    <span class="changing-courses-label">Actualmente ofrecemos:</span>
                    <div class="changing-courses" id="changingCourses">
                        <!-- Los cursos se insertarán dinámicamente con JavaScript -->
                    </div>
                </div>
                
                <a href="tipo-persona.html" class="btn-hero animate__animated animate__pulse animate__infinite">
                    Inscríbete ahora <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </section>
        
        <section class="main-content">
            <div class="section-title">
                <h1>Nuestra Biblioteca de Cursos</h1>
                <div class="title-decoration"></div>
            </div>
            
            <div class="courses-container">
                <?php
                    $animation_delay = 0;
                    while ($row = $resultadoCursos->fetch_assoc()) {
                        $curso = $row['curso'];
                        $query2 = "SELECT * FROM curso WHERE id_curso = '$curso'";
                        $resultado2 = mysqli_query($connection, $query2);
                        $fila = mysqli_fetch_assoc($resultado2);
                        $animation_delay += 0.1;
                        
                        $estado_curso = $row["statuss"];
                        $razon_no_activo = $row["razon"];
                        $cupos_disponibles = $row["cupo"];
                        $fecha_inicio = $row["fecha_inicio"];
                        $fecha_cierre = $row["fecha_cierre"];
                        
                        // Determinar el estado del curso
                        if ($estado_curso == "no_activo") {
                            $status_class = "status-inactive";
                            $status_text = "No Disponible";
                        } elseif ($cupos_disponibles <= 0) {
                            $status_class = "status-progress";
                            $status_text = "Lleno";
                        } else {
                            $status_class = "status-active";
                            $status_text = "Disponible";
                        }
                ?>
                    <div class="course-card">
                        <div class="course-card-image">
                            <img src="./img/felix_dev.jpg" alt="<?php echo htmlspecialchars($fila['nombre_curso']); ?>">
                            <div class="course-card-badge">
                                <i class="fas fa-users"></i> <?php echo $cupos_disponibles; ?> Cupos
                            </div>
                        </div>
                        <div class="course-card-content">
                            <h3 class="course-card-title"><?php echo htmlspecialchars($fila['nombre_curso']); ?></h3>
                            
                            <div class="course-card-meta">
                                <span><i class="far fa-calendar-alt"></i> <?php echo $fecha_inicio; ?></span>
                                <span><i class="far fa-calendar-check"></i> <?php echo $fecha_cierre; ?></span>
                            </div>
                            
                            <span class="course-card-status <?php echo $status_class; ?>">
                                <i class="fas fa-circle"></i> <?php echo $status_text; ?>
                            </span>
                            
                            <?php if ($estado_curso == "no_activo"): ?>
                                <p class="text-muted"><i class="fas fa-info-circle"></i> <?php echo htmlspecialchars($razon_no_activo); ?></p>
                                <a href="#" class="course-card-button btn-disabled">No Disponible</a>
                            <?php elseif ($cupos_disponibles <= 0): ?>
                                <a href="#" class="course-card-button btn-disabled">Cupos Agotados</a>
                            <?php else: ?>
                                <form method="POST" action="./curso_vista.php">
                                    <input type="hidden" name="curso" value="<?php echo $curso; ?>">
                                    <input type="hidden" name="plani" value="<?php echo $row["id_plani"]; ?>">
                                    <button type="submit" class="course-card-button btn-enroll w-100">
                                        <i class="fas fa-eye"></i> Ver Detalles
                                    </button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>
        </section>
    </main>
    
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-about">
                <div class="footer-logo">
                    <img src="img/felix_dev.jpg" alt="FELIX DEV CURSOS">
                    <div class="footer-logo-text">FELIX <span>DEV</span></div>
                </div>
                <p>Plataforma de educación online dedicada a brindar cursos de calidad con certificación reconocida.</p>
                <div class="footer-social">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            
            <div class="footer-links">
                <h3>Enlaces Rápidos</h3>
                <ul>
                    <li><a href="#quienes-somos"><i class="fas fa-chevron-right"></i> Quiénes Somos</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Nuestros Cursos</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Certificaciones</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Preguntas Frecuentes</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Políticas de Privacidad</a></li>
                </ul>
            </div>
            
            <div class="footer-links">
                <h3>Recursos</h3>
                <ul>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Blog Educativo</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Guías de Estudio</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Material Gratuito</a></li>
                </ul>
            </div>
            
            <div class="footer-contact">
                <h3>Contacto</h3>
                <p><i class="fas fa-map-marker-alt"></i></p>
                <p><i class="fas fa-phone-alt"></i></p>
                <p><i class="fas fa-envelope"></i></p>
                <p><i class="fas fa-clock"></i> Lunes a Lunes</p>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>Desarrollado por Estudiantes de la UPTYAB</p>
        </div>
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Mobile menu toggle
        document.getElementById('hamburger').addEventListener('click', function() {
            document.querySelector('.nav-links').classList.toggle('active');
            this.querySelector('i').classList.toggle('fa-bars');
            this.querySelector('i').classList.toggle('fa-times');
        });
        
        // Slider functionality
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slider-slide');
        const dots = document.querySelectorAll('.slider-dot');
        
        function showSlide(n) {
            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));
            
            currentSlide = (n + slides.length) % slides.length;
            slides[currentSlide].classList.add('active');
            dots[currentSlide].classList.add('active');
        }
        
        function nextSlide() {
            showSlide(currentSlide + 1);
        }
        
        // Set up dot click events
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                showSlide(index);
            });
        });
        
        // Auto slide change
        setInterval(nextSlide, 5000);
        
        // Rotating courses text
        const courses = <?php echo $cursos_json; ?>;
        const changingCourses = document.getElementById('changingCourses');
        
        if (courses.length > 0) {
            // Create course items
            courses.forEach((course, index) => {
                const courseItem = document.createElement('div');
                courseItem.className = 'course-item';
                courseItem.textContent = course;
                changingCourses.appendChild(courseItem);
            });
            
            // Set first course as active
            changingCourses.children[0].classList.add('active');
            
            // Rotate courses every 3 seconds
            let currentCourse = 0;
            setInterval(() => {
                changingCourses.children[currentCourse].classList.remove('active');
                currentCourse = (currentCourse + 1) % courses.length;
                changingCourses.children[currentCourse].classList.add('active');
            }, 3000);
            
            // Add more items if there are less than 3 to make animation smoother
            if (courses.length < 3) {
                for (let i = 0; i < 3 - courses.length; i++) {
                    const courseItem = document.createElement('div');
                    courseItem.className = 'course-item';
                    courseItem.textContent = courses[i];
                    changingCourses.appendChild(courseItem);
                }
            }
        } else {
            changingCourses.innerHTML = '<div class="course-item active">Cursos Disponibles</div>';
        }
        
        // Animation on scroll for cards
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.course-card');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.animation = `fadeInUp 0.6s ease forwards`;
                    }
                });
            }, { threshold: 0.1 });
            
            cards.forEach(card => {
                observer.observe(card);
            });
        });
    </script>
</body>
</html>