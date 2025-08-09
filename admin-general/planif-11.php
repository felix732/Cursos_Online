<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planificación de Cursos</title>
    
    <!-- Fuentes Google -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Iconos Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <style>
        :root {
            --color-primario: #2c3e50;
            --color-secundario: #3498db;
            --color-exito: #27ae60;
            --color-advertencia: #f1c40f;
            --color-fondo: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%);
            --sombra: 0 5px 15px rgba(0, 0, 0, 0.1);
            --sombra-hover: 0 10px 25px rgba(0, 0, 0, 0.15);
            --borde-redondeado: 12px;
            --transicion: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #89f7fe 0%, #66a6ff 100%);
            min-height: 100vh;
            padding: 0;
            margin: 0;
            color: #333;
        }

        /* Cabecera */
        .cabecera {
            background: rgba(255, 255, 255, 0.9);
            box-shadow: var(--sombra);
            padding: 1rem 2rem;
            backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo img {
            height: 50px;
            width: 50px;
            border-radius: 50%;
            border: 2px solid var(--color-secundario);
            object-fit: cover;
            transition: var(--transicion);
        }

        .logo img:hover {
            transform: rotate(10deg) scale(1.1);
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 1.5rem;
            margin: 0;
            padding: 0;
        }

        .nav-links a {
            color: var(--color-primario);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transicion);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: var(--borde-redondeado);
        }

        .nav-links a:hover {
            background-color: rgba(52, 152, 219, 0.1);
            transform: translateY(-3px);
        }

        /* Barra inferior */
        .barra-inferior {
            background: rgba(255, 255, 255, 0.8);
            padding: 1.5rem;
            margin: 2rem auto;
            border-radius: var(--borde-redondeado);
            max-width: 1200px;
            box-shadow: var(--sombra);
            backdrop-filter: blur(5px);
            text-align: center;
        }

        .barra-inferior h1 {
            color: var(--color-primario);
            font-weight: 600;
            margin: 0;
            font-size: 1.5rem;
        }

        /* Contenedor del formulario */
        .form-container {
            max-width: 700px;
            margin: 2rem auto;
            padding: 2.5rem;
            background: rgba(255, 255, 255, 0.95);
            border-radius: var(--borde-redondeado);
            box-shadow: var(--sombra);
            transition: var(--transicion);
            animation: fadeInUp 0.5s ease-out;
        }

        .form-container:hover {
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .form-container h1 {
            color: var(--color-primario);
            font-weight: 600;
            margin-bottom: 2rem;
            text-align: center;
            position: relative;
            padding-bottom: 1rem;
        }

        .form-container h1::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, var(--color-secundario), var(--color-primario));
            border-radius: 2px;
        }

        /* Estilos para los campos del formulario */
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-label {
            font-weight: 500;
            color: var(--color-primario);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-control, .form-select {
            border-radius: var(--borde-redondeado);
            padding: 0.75rem 1rem;
            border: 1px solid #ddd;
            transition: var(--transicion);
            box-shadow: none;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--color-secundario);
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        /* Contador de caracteres */
        .char-counter {
            font-size: 0.8rem;
            color: #666;
            text-align: right;
            margin-top: 0.25rem;
        }

        /* Sección del facilitador */
        .facilitador-section {
            background-color: rgba(241, 196, 15, 0.1);
            padding: 1.5rem;
            border-radius: var(--borde-redondeado);
            margin-bottom: 1.5rem;
            border-left: 4px solid var(--color-advertencia);
        }

        .facilitador-info {
            display: flex;
            gap: 1rem;
            align-items: center;
            margin-top: 1rem;
        }

        .facilitador-info input {
            flex: 1;
            background-color: #f8f9fa;
        }

        /* Botones */
        .btn {
            border-radius: var(--borde-redondeado);
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            transition: var(--transicion);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border: none;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: var(--sombra-hover);
        }

        .btn:active {
            transform: translateY(1px);
        }

        .btn-primary {
            background-color: var(--color-secundario);
        }

        .btn-warning {
            background-color: var(--color-advertencia);
            color: #333;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        /* Sección de botones */
        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 2rem;
        }

        /* Responsivo */
        @media (max-width: 768px) {
            .cabecera {
                flex-direction: column;
                padding: 1rem;
                gap: 1rem;
            }
            
            .nav-links {
                flex-direction: column;
                gap: 0.8rem;
            }
            
            .form-container {
                padding: 1.5rem;
                margin: 1rem;
            }
            
            .facilitador-info {
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .form-actions {
                flex-direction: column;
                gap: 1rem;
            }
            
            .btn {
                width: 100%;
            }
        }

        /* Animaciones */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body>
    <header class="cabecera">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="adm-general.html"><img src="adm-interna/adm-img/felix_dev.jpg" alt="logo institucional"></a>
            </div>
            <nav>
                <ul class="nav-links">
                    <li><a href="adm-curso.php"><i class="fas fa-tachometer-alt"></i> Panel Control</a></li>
                    <li><a href="adm-curso-1.php"><i class="fas fa-book"></i> Curso</a></li>
                    <li><a href="consulta_plani.php"><i class="fas fa-calendar-check"></i> Controlador</a></li>
                    <li><a href="./cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="barra-inferior animate__animated animate__fadeIn">
        <h1><i class="fas fa-calendar-plus"></i> Aquí puedes consultar o crear la planificación</h1>
    </div>

    <div class="form-container animate__animated animate__fadeInUp">
        <h1><i class="fas fa-plus-circle"></i> Crear una Planificación</h1>

        <form action="envio_plani.php" method="POST" id="planificacionForm">
            <!-- Sección Curso -->
            <div class="form-group">
                <label for="curso" class="form-label">
                    <i class="fas fa-book"></i> Curso
                </label>
                <select name="curso" id="curso" class="form-select" required>
                    <option value="" disabled selected>Selecciona un Curso</option>
                    <?php
                    include_once 'conexion_adm.php';
                    $queryy = mysqli_query($connection, "SELECT * FROM curso");
                    while ($datos = mysqli_fetch_array($queryy)) {
                        echo '<option value="'.$datos['id_curso'].'">'.$datos['nombre_curso'].' - '.$datos['id_curso'].'</option>';
                    }
                    ?>
                </select>
            </div>

            <!-- Sección Facilitador -->
            <div class="facilitador-section">
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-chalkboard-teacher"></i> Facilitador
                    </label>
                    <center>
                        <button type="button" class="btn btn-warning pulse" data-bs-toggle="modal" data-bs-target="#select">
                            <i class="fas fa-user-plus"></i> Seleccionar Facilitador
                        </button>
                    </center>
                </div>

                <div class="facilitador-info">
                    <div class="w-100">
                        <label class="form-label"><i class="fas fa-user"></i> Facilitador seleccionado</label>
                        <input type="text" class="form-control" id="faci" name="facii" readonly>
                    </div>
                    <div class="w-100">
                        <label class="form-label"><i class="fas fa-book-open"></i> Curso que imparte</label>
                        <input type="text" class="form-control" id="cursoSeleccionado" name="cursoSeleccionado" readonly>
                    </div>
                </div>
                <input type="hidden" id="idPersona" name="faci" value="">
            </div>

            <input type="hidden" name="status" value="Activo">

            <!-- Sección Cupos -->
            <div class="form-group">
                <label for="max-registrations" class="form-label">
                    <i class="fas fa-users"></i> Cupos del Curso
                </label>
                <input type="number" class="form-control" id="max-registrations" name="max-registrations" required>
            </div>

            <!-- Sección Fechas -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fechaInicio" class="form-label">
                            <i class="fas fa-calendar-day"></i> Fecha de Inicio
                        </label>
                        <input type="date" class="form-control" name="fecha_inicio" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fechaCierre" class="form-label">
                            <i class="fas fa-calendar-times"></i> Fecha de Cierre
                        </label>
                        <input type="date" class="form-control" name="fecha_cierre" required>
                    </div>
                </div>
            </div>

            <!-- Sección Días -->
            <div class="form-group">
                <label for="diasSemana" class="form-label">
                    <i class="fas fa-calendar-week"></i> Días de la Semana
                </label>
                <select name="dias" class="form-select" required>
                    <option value="1">1 día</option>
                    <option value="2">2 días</option>
                    <option value="3">3 días</option>
                    <option value="4">4 días</option>
                    <option value="5">5 días</option>
                    <option value="6">6 días</option>
                    <option value="7">7 días</option>
                </select>
            </div>

            <!-- Sección Objetivos -->
            <div class="form-group">
                <label for="objetivos" class="form-label">
                    <i class="fas fa-bullseye"></i> Objetivos
                    <small class="text-muted">(Máximo 500 caracteres)</small>
                </label>
                <textarea class="form-control" id="objetivos" name="objetivos" rows="3" maxlength="500" required></textarea>
                <div class="char-counter"><span id="objetivos-counter">0</span>/500 caracteres</div>
            </div>

            <!-- Sección Descripción -->
            <div class="form-group">
                <label for="descripcion" class="form-label">
                    <i class="fas fa-align-left"></i> Descripción
                    <small class="text-muted">(Máximo 500 caracteres)</small>
                </label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" maxlength="500" required></textarea>
                <div class="char-counter"><span id="descripcion-counter">0</span>/500 caracteres</div>
            </div>

            <!-- Botones de acción -->
            <div class="form-actions">
                <a href="adm-curso.php" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver Atrás
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-paper-plane"></i> Enviar Planificación
                </button>
            </div>
        </form>
    </div>

    <?php include './obtener_facilitador.php'; ?>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Función para seleccionar facilitador
        function seleccionarFacilitador(idPersona, nombreFacilitador, cursoSeleccionado) {
            document.getElementById('faci').value = nombreFacilitador;
            document.getElementById('idPersona').value = idPersona;
            document.getElementById('cursoSeleccionado').value = cursoSeleccionado;
            $('#select').modal('hide');
            
            // Efecto visual de confirmación
            const faciInput = document.getElementById('faci');
            faciInput.classList.add('animate__animated', 'animate__pulse');
            setTimeout(() => {
                faciInput.classList.remove('animate__animated', 'animate__pulse');
            }, 1000);
        }

        // Contadores de caracteres
        document.getElementById('objetivos').addEventListener('input', function() {
            document.getElementById('objetivos-counter').textContent = this.value.length;
        });

        document.getElementById('descripcion').addEventListener('input', function() {
            document.getElementById('descripcion-counter').textContent = this.value.length;
        });

        // Validación de fechas
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('planificacionForm');
            
            form.addEventListener('submit', function(e) {
                const fechaInicio = new Date(document.getElementsByName("fecha_inicio")[0].value);
                const fechaCierre = new Date(document.getElementsByName("fecha_cierre")[0].value);
                const diferencia = fechaCierre - fechaInicio;
                const diasDiferencia = Math.ceil(diferencia / (1000 * 60 * 60 * 24));

                if (diasDiferencia < 7) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Error en las fechas',
                        text: 'La diferencia entre la fecha de inicio y cierre debe ser de al menos una semana.',
                        icon: 'error',
                        confirmButtonColor: '#3498db'
                    });
                }
            });
        });

        // Efecto hover en botones
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('mouseenter', () => {
                btn.style.transform = 'translateY(-3px)';
            });
            btn.addEventListener('mouseleave', () => {
                btn.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>
</html>