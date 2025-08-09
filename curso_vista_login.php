<?php
session_start();
include './conexion.php';

$curso = $_POST['curso'];
$query = "SELECT * FROM curso WHERE id_curso = '$curso'";
$resultado = mysqli_query($connection, $query);
$fila = mysqli_fetch_assoc($resultado);

$plani = $_POST['plani'];
$query2 = "SELECT * FROM planificacion WHERE id_plani = '$plani'";
$resultado2 = mysqli_query($connection, $query2);
$fila2 = mysqli_fetch_assoc($resultado2);

$facilitador = $fila2['facilitador'];
$query3 = "SELECT * FROM persona WHERE id = '$facilitador'";
$resultado3 = mysqli_query($connection, $query3);
$fila3 = mysqli_fetch_assoc($resultado3);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $fila['nombre_curso']; ?> | Felix_DEV</title>
    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #f39c12;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
            --text-color: #333;
            --text-light: #7f8c8d;
            --success-color: #27ae60;
            --box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            --border-radius: 8px;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f7fa;
            color: var(--text-color);
            line-height: 1.6;
        }

        /* Header */
        .header {
            background-color: white;
            box-shadow: var(--box-shadow);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo img {
            height: 50px;
            transition: var(--transition);
        }

        .logo img:hover {
            transform: scale(1.05);
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .bienvenido {
            background-color: var(--accent-color);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Main Content */
        .contenido-gral {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        @media (min-width: 992px) {
            .contenido-gral {
                grid-template-columns: 1fr 1fr;
            }
        }

        .video {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .video img {
            width: 100%;
            height: auto;
            max-height: 400px;
            object-fit: cover;
        }

        .section {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 1.5rem;
        }

        .title h3 {
            color: var(--primary-color);
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }

        .title p {
            color: var(--text-light);
            font-size: 1rem;
        }

        hr {
            border: none;
            height: 1px;
            background-color: #eee;
            margin: 1rem 0;
        }

        .icons {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--accent-color);
            font-size: 1.2rem;
        }

        .icons2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin: 1rem 0;
        }

        .icons2 img {
            width: 30px;
            height: 30px;
        }

        .icons2 div {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }

        .instructor p {
            margin: 0.5rem 0;
            font-size: 0.95rem;
        }

        .instructor b {
            color: var(--primary-color);
        }

        /* Suscribirse Button */
        .suscribirse form input[type="submit"] {
            width: 100%;
            padding: 1rem;
            background-color: var(--success-color);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            margin-top: 1rem;
        }

        .suscribirse form input[type="submit"]:hover {
            background-color: #219653;
            transform: translateY(-2px);
        }

        .suscribirse p {
            text-align: center;
            padding: 1rem;
            background-color: var(--light-color);
            border-radius: var(--border-radius);
            color: var(--text-light);
        }

        /* Detalles del Curso */
        .conteudo-curso {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .detalles-curso {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 1.5rem;
        }

        .detalles-curso .title h3 {
            font-size: 1.5rem;
            color: var(--primary-color);
        }

        .descripcion h3 {
            color: var(--primary-color);
            margin: 1rem 0 0.5rem;
            font-size: 1.2rem;
        }

        .descripcion p {
            margin-bottom: 1rem;
            text-align: justify;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                padding: 1rem;
                gap: 1rem;
            }
            
            .user-info {
                width: 100%;
                justify-content: center;
            }
            
            .icons2 {
                grid-template-columns: 1fr;
            }
            
            .title h3 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="logo">
            <a href="./a01_vista.php"><img src="img/felix_dev.jpg" alt="logo institucional"></a>
        </div>
        <div class="user-info">
            <div class="bienvenido">
                <i class="fas fa-user-graduate"></i>
                <span>Inscríbete <?php echo $_SESSION['usuario']; ?> y aprenderás</span>
            </div>
        </div>
    </header>

    <div class="contenido-gral">
        <div class="video">
            <img src="./img/felix_dev.jpg" alt="Imagen del curso">
        </div>

        <div class="section">
            <div class="title">
                <h3><?php echo $fila['nombre_curso']; ?></h3>
                <p><?php echo $fila['categoria_curso']; ?></p>
                <hr>
            </div>
            <div class="icons">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <hr>
            </div>

            <div class="icons2">
                <div>
                    <img src="img/icons/libro.png" alt="Certificado">
                    <p>Certificado Para Ti</p>
                </div>
                <div>
                    <img src="img/icons/book.png" alt="Material">
                    <p>Material Implementario</p>
                </div>
            </div>
            
            <div class="instructor">
                <hr>
                <p><b>INSTRUCTOR:</b> <?php echo $fila3['nombre'] . " " . $fila3['apellido']; ?></p>
                <hr>
                <p><b>INICIO Y CIERRE:</b> <?php echo $fila2['fecha_inicio']; ?> hasta <?php echo $fila2['fecha_cierre']; ?></p>
                <hr>
            </div>

            <div class="suscribirse">
                <?php
                include './conexion.php';

                $usuario_id = $_SESSION['id'];
                $usuario_id = mysqli_real_escape_string($connection, $usuario_id);

                $inscripcion_sql = "SELECT * FROM inscritos WHERE id_persona = '$usuario_id'";
                $inscripcion_result = $connection->query($inscripcion_sql);

                if ($inscripcion_result !== false && $inscripcion_result->num_rows === 0) {
                    echo '<form action="inscribir.php" method="POST">';
                    echo '    <input type="hidden" name="id_aspirante" value="' . $_SESSION['id'] . '">';
                    echo '    <input type="hidden" name="id_planificacion" value="' . $plani . '">';
                    echo '    <input type="submit" name="inscribir" value="INSCRIBIRME">';
                    echo '</form>';
                } else {
                    echo "<p>Ya estás inscrito en algún curso.</p>";
                }

                mysqli_close($connection);
                ?>
            </div>
        </div>
    </div>

    <div class="conteudo-curso">
        <div class="detalles-curso">
            <div class="title">
                <h3>DETALLES DEL CURSO</h3>
                <hr>
            </div>
            <div class="descripcion">
                <h3>Descripción</h3>
                <p><?php echo $fila2['descripcion']; ?></p>

                <h3>OBJETIVOS</h3>
                <p><?php echo $fila2['objetivos']; ?></p>
            </div>
        </div>
    </div>
</body>
</html>