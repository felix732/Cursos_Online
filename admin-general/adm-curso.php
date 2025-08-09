<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración | FDC-ADMIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #f39c12;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
            --success-color: #27ae60;
            --box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            --border-radius: 10px;
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            --gradient-bg: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%);
        }

        body {
            background: var(--gradient-bg);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #1a2a3a 100%);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            padding: 0.8rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            color: white;
            transition: var(--transition);
        }

        .header.scrolled {
            padding: 0.5rem 2rem;
            background: var(--primary-color);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo img {
            height: 45px;
            transition: var(--transition);
            border-radius: 50%;
            border: 2px solid var(--accent-color);
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(to right, var(--accent-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: 1px;
        }

        .logo-text span {
            color: white;
            -webkit-text-fill-color: white;
        }

        .logo:hover img {
            transform: rotate(10deg) scale(1.1);
        }

        nav {
            display: flex;
            align-items: center;
        }

        .nav-links {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 1.2rem;
        }

        .nav-links li {
            position: relative;
        }

        .nav-links a {
            color: var(--accent-color);
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 0;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.95rem;
        }

        .nav-links a:hover {
            color: var(--accent-color);
            transform: translateY(-2px);
        }

        .nav-links a i {
            font-size: 1.1rem;
        }

        .dropdown-menu {
            border: none;
            box-shadow: var(--box-shadow);
            animation: fadeIn 0.3s ease-out;
            border-radius: var(--border-radius);
            padding: 0.5rem 0;
            background-color: white;
        }

        .dropdown-item {
            padding: 0.6rem 1.5rem;
            transition: var(--transition);
            color: var(--primary-color);
            font-weight: 500;
        }

        .dropdown-item:hover {
            background-color: rgba(52, 152, 219, 0.1);
            color: var(--secondary-color);
            transform: translateX(5px);
        }

        .dropdown-item i {
            width: 20px;
            text-align: center;
            margin-right: 8px;
            color: var(--secondary-color);
        }

        .nav-link.dropdown-toggle::after {
            margin-left: 0.3em;
            vertical-align: 0.15em;
            transition: var(--transition);
        }

        .nav-item.dropdown:hover .dropdown-toggle::after {
            transform: rotate(180deg);
        }

        /* Cards */
        .contenedor {
            max-width: 1400px;
            margin: 3rem auto;
            padding: 0 1.5rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2.5rem;
        }

        .tarjeta {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            height: 100%;
            position: relative;
            border: none;
        }

        .tarjeta::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--secondary-color), var(--accent-color));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.5s ease;
        }

        .tarjeta:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .tarjeta:hover::before {
            transform: scaleX(1);
        }

        .tarjeta figure {
            height: 180px;
            overflow: hidden;
            margin: 0;
            position: relative;
        }

        .tarjeta img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .tarjeta:hover img {
            transform: scale(1.1);
        }

        .card-body {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .tarjeta h3 {
            color: var(--primary-color);
            margin: 0 0 0.8rem;
            font-size: 1.4rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .tarjeta h3 i {
            color: var(--secondary-color);
            font-size: 1.3rem;
        }

        .tarjeta p {
            color: #666;
            margin: 0 0 1.5rem;
            font-size: 0.95rem;
            line-height: 1.5;
            flex-grow: 1;
        }

        .tarjeta a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--secondary-color), #2980b9);
            color: white;
            text-align: center;
            padding: 0.8rem;
            border-radius: var(--border-radius);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            width: auto;
            align-self: flex-start;
            box-shadow: 0 4px 10px rgba(52, 152, 219, 0.3);
            gap: 0.5rem;
        }

        .tarjeta a:hover {
            background: linear-gradient(135deg, #2980b9, var(--secondary-color));
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(52, 152, 219, 0.4);
        }

        /* Floating elements */
        .floating {
            position: absolute;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            pointer-events: none;
            z-index: -1;
        }

        /* Modal styles */
        .modal-content {
            border-radius: var(--border-radius);
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #1a2a3a 100%);
            color: white;
            border-bottom: none;
            border-radius: var(--border-radius) var(--border-radius) 0 0;
        }

        .modal-title {
            font-weight: 600;
        }

        .modal-body {
            padding: 2rem;
        }

        .form-label {
            font-weight: 500;
            color: var(--primary-color);
        }

        .form-control {
            border-radius: var(--border-radius);
            padding: 0.75rem 1rem;
            border: 1px solid #ddd;
            transition: var(--transition);
        }

        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--secondary-color), #2980b9);
            border: none;
            border-radius: var(--border-radius);
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            transition: var(--transition);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #2980b9, var(--secondary-color));
            transform: translateY(-2px);
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .contenedor {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 2rem;
            }
        }

        @media (max-width: 992px) {
            .header {
                flex-direction: column;
                padding: 1rem;
                gap: 1.2rem;
                text-align: center;
            }
            
            .logo {
                justify-content: center;
            }
            
            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
                gap: 1rem;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                flex-direction: column;
                align-items: center;
                gap: 0.8rem;
            }
            
            .contenedor {
                grid-template-columns: 1fr;
                max-width: 500px;
            }
            
            .logo-text {
                font-size: 1.3rem;
            }
        }

        /* Pulse animation for important elements */
        .pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(52, 152, 219, 0.7);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(52, 152, 219, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(52, 152, 219, 0);
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="logo">
            <a href="#"><img src="adm-interna/adm-img/felix_dev.jpg" alt="logo FDC-ADMIN"></a>
            <div class="logo-text">FDC-<span>ADMIN</span></div>
        </div>
        
        <nav>
            <ul class="nav-links">
                <li><a href="planif-11.php"><i class="fas fa-calendar-alt"></i> Planificación</a></li>
                <li><a href="solicitudes.php"><i class="fas fa-envelope"></i> Solicitudes</a></li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-map-marked-alt"></i> Regiones
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="./estado_mun_parr/registro_estado.php"><i class="fas fa-flag"></i> Estados</a></li>
                        <li><a class="dropdown-item" href="./estado_mun_parr/registro_municipio.php"><i class="fas fa-city"></i> Municipios</a></li>
                        <li><a class="dropdown-item" href="./estado_mun_parr/registro_parroquias.php"><i class="fas fa-map-pin"></i> Parroquias</a></li>
                    </ul>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-cog"></i> Configuración
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#cambioClaveModal"><i class="fas fa-key"></i> Cambiar Clave</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="./cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>

    <div class="contenedor">
        <div class="tarjeta">
            <figure>
                <img src="adm-interna/adm-img/pizarra.jpg" alt="Personas">
            </figure>
            <div class="card-body">
                <h3><i class="fas fa-users"></i> Personas</h3>
                <p>Personas Inscritas podrás Editar/Eliminar registros de usuarios.</p>
                <a href="adm-estudiante.php">Ver Más <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>

        <div class="tarjeta">
            <figure>
                <img src="adm-interna/adm-img/pagina.jpg" alt="Facilitadores">
            </figure>
            <div class="card-body">
                <h3><i class="fas fa-chalkboard-teacher"></i> FACILITADORES</h3>
                <p>Gestiona los profesores inscritos en el sistema.</p>
                <a href="facilitador.php">Ver Más <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>

        <div class="tarjeta pulse">
            <figure>
                <img src="adm-interna/adm-img/castor.jpg" alt="Cursos">
            </figure>
            <div class="card-body">
                <h3><i class="fas fa-book-open"></i> CURSOS</h3>
                <p>Crea y gestiona los cursos disponibles en la plataforma.</p>
                <a href="adm-curso-1.php">Ver Más <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>

        <div class="tarjeta">
            <figure>
                <img src="adm-interna/adm-img/inscritos.png" alt="Inscritos">
            </figure>
            <div class="card-body">
                <h3><i class="fas fa-user-check"></i> INSCRITOS</h3>
                <p>Consulta y gestiona los usuarios inscritos en cursos.</p>
                <a href="./inscritos.php">Ver Más <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <!-- Modal de Cambio de Clave y Usuario -->
    <div class="modal fade" id="cambioClaveModal" tabindex="-1" aria-labelledby="cambioClaveModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cambioClaveModalLabel"><i class="fas fa-key me-2"></i> Cambiar Credenciales</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formCambioClave" action="actualizar_credenciales.php" method="POST">
                        <div class="mb-3">
                            <label for="usuarioActual" class="form-label">Usuario Actual</label>
                            <input type="text" class="form-control" id="usuarioActual" name="usuarioActual" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nuevoUsuario" class="form-label">Nuevo Usuario</label>
                            <input type="text" class="form-control" id="nuevoUsuario" name="nuevoUsuario" required>
                        </div>
                        <div class="mb-3">
                            <label for="claveActual" class="form-label">Contraseña Actual</label>
                            <input type="password" class="form-control" id="claveActual" name="claveActual" required>
                        </div>
                        <div class="mb-3">
                            <label for="nuevaClave" class="form-label">Nueva Contraseña</label>
                            <input type="password" class="form-control" id="nuevaClave" name="nuevaClave" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmarClave" class="form-label">Confirmar Nueva Contraseña</label>
                            <input type="password" class="form-control" id="confirmarClave" name="confirmarClave" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i> Guardar Cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.header');
            header.classList.toggle('scrolled', window.scrollY > 0);
        });

        // Create floating elements
        function createFloatingElements() {
            const colors = ['rgba(52, 152, 219, 0.1)', 'rgba(243, 156, 18, 0.1)', 'rgba(46, 204, 113, 0.1)'];
            
            for (let i = 0; i < 15; i++) {
                const floating = document.createElement('div');
                floating.classList.add('floating');
                
                // Random properties
                const size = Math.random() * 100 + 50;
                const posX = Math.random() * window.innerWidth;
                const posY = Math.random() * window.innerHeight;
                const color = colors[Math.floor(Math.random() * colors.length)];
                const delay = Math.random() * 5;
                const duration = Math.random() * 10 + 10;
                
                floating.style.width = `${size}px`;
                floating.style.height = `${size}px`;
                floating.style.left = `${posX}px`;
                floating.style.top = `${posY}px`;
                floating.style.background = color;
                floating.style.animation = `float ${duration}s ease-in-out ${delay}s infinite`;
                
                document.body.appendChild(floating);
            }
        }

        // Initialize animations
        document.addEventListener('DOMContentLoaded', function() {
            // Create floating elements
            createFloatingElements();
            
            // Add hover effect to cards
            const cards = document.querySelectorAll('.tarjeta');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-10px)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
            
            // Add animation to dropdown items
            const dropdownItems = document.querySelectorAll('.dropdown-item');
            dropdownItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateX(5px)';
                });
                item.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateX(0)';
                });
            });

            // Mostrar el usuario actual en el modal
            const cambioClaveModal = document.getElementById('cambioClaveModal');
            if (cambioClaveModal) {
                cambioClaveModal.addEventListener('show.bs.modal', function() {
                    // Aquí deberías obtener el usuario actual de la sesión o de donde lo tengas almacenado
                    // Esto es un ejemplo, debes implementar la lógica para obtener el usuario real
                    const usuarioActual = "admin"; // Reemplaza esto con el usuario real
                    document.getElementById('usuarioActual').value = usuarioActual;
                });
            }

            // Validación del formulario de cambio de clave
            const formCambioClave = document.getElementById('formCambioClave');
            if (formCambioClave) {
                formCambioClave.addEventListener('submit', function(e) {
                    const nuevaClave = document.getElementById('nuevaClave').value;
                    const confirmarClave = document.getElementById('confirmarClave').value;
                    
                    if (nuevaClave !== confirmarClave) {
                        e.preventDefault();
                        alert('Las contraseñas nuevas no coinciden');
                        return false;
                    }
                    
                    // Aquí puedes agregar más validaciones si es necesario
                    return true;
                });
            }
        });
    </script>
</body>
</html>