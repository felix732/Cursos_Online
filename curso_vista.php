<?php
    include './conexion.php';
    $curso = $_POST['curso'];
    $query = "SELECT * FROM curso WHERE id_curso = '$curso'";
    $resultado = mysqli_query($connection, $query);
    $fila = mysqli_fetch_assoc($resultado);

    $plani = $_POST['plani'];
    $query2 = "SELECT * FROM planificacion WHERE id_plani = '$plani'";
    $resultado2 = mysqli_query($connection, $query2);
    $fila2 = mysqli_fetch_assoc($resultado2);

    $facilitador= $fila2['facilitador'];
    $query3 = "SELECT * FROM persona WHERE id = '$facilitador'";
    $resultado3 = mysqli_query($connection, $query3);
    $fila3 = mysqli_fetch_assoc($resultado3);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $fila['nombre_curso']; ?> | Felix_DEV</title>
    <link rel="stylesheet" href="">
    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="stylesheet" href="style/header2.css">
    <link rel="stylesheet" href="style/style-video/robotica.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
</head>

<body>
    <header class="header">
        <div class="logo">
            <a href="./index.php"><img src="./img/felix_dev.jpg" alt="logo institucional"></a>
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="iniciar_sesion.php">Iniciar Sesion</a></li>
                <li class="reistro"><a href="tipo-persona.html">Quiero Registrarme</a></li>
            </ul>
        </nav>
    </header>




    <div class="contenido-gral">
        <div class="video">
            <img src="./img/felix_dev.jpg" style="width: 600px;">
        </div>

        <div class="section">
            <div class="title">
                <h3><?php echo $fila['nombre_curso']; ?></h3>
                <p><?php echo $fila['categoria_curso']; ?></p>
                <hr>
            </div>
            <div class="icons">
                <i class="fa-solid fa-star" style="color: #ffa200;"></i>
                <i class="fa-solid fa-star" style="color: #ffa200;"></i>
                <i class="fa-solid fa-star" style="color: #ffa200;"></i>
                <i class="fa-solid fa-star" style="color: #ffa200;"></i>
                <hr>
            </div>


            <div class="icons2">
                <img src="img/icons/libro.png" alt="">
                <p>Certificado Para Ti</p>

                <img src="img/icons/book.png" alt="">
                <p>Material Implementario</p>
            </div>
            <div class="instructor">
                <hr>
                <p><b>INSTRUCTOR:</b> <?php echo $fila3['nombre']; echo " "; echo $fila3['apellido']; ?></p>
                <hr>
                <p><b>INICIO Y CIERRE:</b> <?php echo $fila2['fecha_inicio']; ?> hasta <?php echo $fila2['fecha_cierre']; ?></p>
                </hr>
            </div>


            <div class="coste">
                <p><b>COSTO:</b> Gratuito</p>
                <hr>
            </div>
            <div class="suscribirse">
                <a href="tipo-persona.html"><input type="submit" id="suscripcion" value="INSCRIBIRME"></a>
            </div>
        </div>
    </div>

    <div class="conteudo-curso" align="right">
        <div class="detalles-curso" align="">
            <div class="title">
                <h3>DETALLES DEL CURSO</h3>
                <hr>
            </div>
            <div class="descripcion">
                <h3>Descripcion</h3>
                <p>
                    <?php echo $fila2['descripcion']; ?>
                </p>

                <h3>OBJETIVOS</h3>


                <p>
                    <?php echo $fila2['objetivos']; ?>
                </p>

            </div>
        </div>
    </div>




</body>

</html>