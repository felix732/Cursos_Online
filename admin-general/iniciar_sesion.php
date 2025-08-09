<?php


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style/iniciar_sesion.css">
    <link rel="stylesheet" href="style/header.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Inicio de Sesion</title>
</head>

<body>
    <header class="header">
        <div class="logo">
            <a href="index.html"><img src="../img/felix_dev.jpg" alt="logo institucional"></a>
        </div>
        <nav>
        <ul class="nav-links">
          <li><div class="registro-section">
                    <p>¿No tienes una cuenta?</p>
                        <center><a href="tipo-persona.html" class="btn btn-success">Registrarme</a></center>
                    </div></li>
                    <li><div class="registro-section">
                        <p>Iniciar Sesion como Facilitador</p>
                        <center><a href="./vista_facilitador/iniciar_sesion_faci.php" class="btn btn-success">Entrar</a></center>
                    </div></li>
        </ul>
      </nav>
    </header>




    <center>
        <div class="contenedor">


            <div class="form">
                <h2 class="inicio-sesion"> Inicio sesion</h2>
                <form action="validar.php" name="inicio-sesion" method="POST">
                    <input type="text" name="usuario" id="usuario" placeholder="usuario">
                    <br>
                    <div class="container">
                        <input type="password" placeholder="Clave" class="pass" id="pass" name="clave">
                        <i class='bx bx-show'></i>
                    </div>
                    <br>
                    <input type="submit" value="ingresar" class="enviador" name="enviar">
                </form>
                <button class="volver-atras"><a href="index.html">VOLVER ATRAS</a></button><br><br>
            </div><br>

            <div class="imagen">
                <img src="studiante.jpg" alt="estudiante" class="imagen">
            </div>
    </center>

    <script src="js/ojo_clave.js"></script>
</body>

</html>