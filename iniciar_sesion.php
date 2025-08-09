<?php
session_start();
// Verificar si hay un mensaje de error
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
unset($_SESSION['error']);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FDC | Inicio de Sesión</title>
    <link rel="shortcut icon" href="img/favicon.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            display: flex;
            flex-direction: column;
        }
        
        /* Header Styles */
        .header {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            position: sticky;
            top: 0;
            z-index: 1000;
            height: 70px;
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
            transform: scale(1.05);
        }
        
        .logo-text {
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
            margin-left: 20px;
        }
        
        .registro-section {
            display: flex;
            align-items: center;
        }
        
        .registro-section p {
            margin-right: 10px;
            color: var(--text-light);
            font-size: 0.9rem;
        }
        
        .btn-success {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 30px;
            font-weight: 500;
            text-decoration: none;
            font-size: 0.9rem;
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.25);
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .btn-success:hover {
            background: linear-gradient(to right, var(--secondary-color), var(--primary-color));
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(67, 97, 238, 0.35);
        }
        
        /* Main Content */
        .main-container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-grow: 1;
            padding: 40px 5%;
        }
        
        .login-container {
            display: flex;
            max-width: 1000px;
            width: 100%;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
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
        
        .login-form {
            flex: 1;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .login-image {
            flex: 1;
            background: url('img/estudiante.jpg') center/cover no-repeat;
            display: none;
            position: relative;
        }
        
        .login-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, rgba(67, 97, 238, 0.3), rgba(58, 12, 163, 0.5));
        }
        
        .inicio-sesion {
            font-size: 2rem;
            margin-bottom: 30px;
            color: var(--dark-color);
            position: relative;
            text-align: center;
        }
        
        .inicio-sesion:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
            border-radius: 3px;
        }
        
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        
        .form-group input {
            width: 100%;
            padding: 14px 20px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }
        
        .form-group input:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        }
        
        .form-group input::placeholder {
            color: #adb5bd;
        }
        
        .password-container {
            position: relative;
        }
        
        .password-container i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            cursor: pointer;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }
        
        .password-container i:hover {
            color: var(--primary-color);
        }
        
        .enviador {
            width: 100%;
            padding: 14px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
            font-family: 'Poppins', sans-serif;
        }
        
        .enviador:hover {
            background: linear-gradient(to right, var(--secondary-color), var(--primary-color));
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(67, 97, 238, 0.35);
        }
        
        .error-message {
            color: var(--danger-color);
            background: rgba(239, 35, 60, 0.1);
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            font-size: 0.9rem;
            display: <?php echo $error ? 'block' : 'none'; ?>;
        }
        
        .volver-atras {
            width: 100%;
            padding: 12px;
            background: white;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 15px;
            font-family: 'Poppins', sans-serif;
        }
        
        .volver-atras a {
            color: var(--primary-color);
            text-decoration: none;
            display: block;
        }
        
        .volver-atras:hover {
            background: var(--primary-color);
            color: white;
        }
        
        .volver-atras:hover a {
            color: white;
        }
        
        /* Versión móvil con imagen */
        .mobile-image {
            display: block;
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            margin-bottom: 30px;
            border-radius: 12px;
        }
        
        /* Footer */
        .footer {
            text-align: center;
            padding: 20px;
            color: var(--text-light);
            font-size: 0.85rem;
            margin-top: auto;
        }
        
        /* Responsive Design */
        @media (min-width: 768px) {
            .login-image {
                display: block;
            }
            
            .login-form {
                padding: 60px;
            }
            
            .mobile-image {
                display: none;
            }
        }
        
        @media (max-width: 576px) {
            .header {
                padding: 0 20px;
            }
            
            .registro-section {
                flex-direction: column;
                align-items: flex-end;
            }
            
            .registro-section p {
                margin-right: 0;
                margin-bottom: 5px;
                font-size: 0.8rem;
            }
            
            .login-form {
                padding: 30px;
            }
            
            .inicio-sesion {
                font-size: 1.8rem;
                margin-bottom: 25px;
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
                <li>
                    <div class="registro-section">
                        <p>¿No tienes una cuenta?</p>
                        <a href="tipo-persona.html" class="btn-success">Registrarme</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <main class="main-container">
        <div class="login-container">
            <div class="login-form">
                <?php if($error): ?>
                    <div class="error-message">
                        <i class='bx bx-error-circle'></i> <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>
                
                <!-- Imagen para móviles -->
                <img src="./estudiantee.jpg" alt="Estudiante aprendiendo" class="mobile-image">
                
                <h2 class="inicio-sesion">Inicio de Sesión</h2>
                <form action="validar.php" method="POST" autocomplete="off">
                    <div class="form-group">
                        <input type="text" name="usuario" id="usuario" placeholder="Usuario" required>
                    </div>
                    
                    <div class="form-group">
                        <div class="password-container">
                            <input type="password" name="clave" id="pass" placeholder="Contraseña" class="pass" required>
                            <i class='bx bx-hide'></i>
                        </div>
                    </div>
                    
                    <button type="submit" class="enviador" name="enviar">Ingresar</button>
                    <button type="button" class="volver-atras"><a href="index.php">VOLVER ATRÁS</a></button>
                </form>
            </div>
            
            <div class="login-image"></div>
        </div>
    </main>

    <footer class="footer">
        <p>&copy; <?php echo date("Y"); ?> FELIX DEV CURSOS (FDC). Todos los derechos reservados.</p>
    </footer>

    <script>
        // Mostrar/ocultar contraseña
        const togglePassword = document.querySelector('.password-container i');
        const password = document.querySelector('.pass');
        
        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('bx-hide');
            this.classList.toggle('bx-show');
        });
        
        // Animación de entrada para el formulario
        document.addEventListener('DOMContentLoaded', function() {
            const loginContainer = document.querySelector('.login-container');
            loginContainer.style.opacity = '1';
        });
    </script>
</body>
</html>