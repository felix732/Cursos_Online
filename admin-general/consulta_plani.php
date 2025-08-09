<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Planificación</title>
    
    <!-- Fuentes e iconos -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root {
            --color-primario: #2c3e50;
            --color-secundario: #3498db;
            --color-fondo: #f8f9fa;
            --sombra: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%);
            margin: 0;
            padding: 0;
        }
        
        /* Header modernizado */
        .header {
            background: white;
            box-shadow: var(--sombra);
            padding: 15px 30px;
        }
        
        .logo img {
            height: 50px;
            width: 50px;
            border-radius: 50%;
            border: 2px solid var(--color-secundario);
            transition: transform 0.3s;
        }
        
        .logo img:hover {
            transform: scale(1.1);
        }
        
        .nav-links {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 20px;
        }
        
        .nav-links a {
            color: var(--color-primario);
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 15px;
            border-radius: 8px;
            transition: all 0.3s;
        }
        
        .nav-links a:hover {
            background-color: rgba(52, 152, 219, 0.1);
            transform: translateY(-2px);
        }
        
        /* Contenedor principal */
        .main-container {
            max-width: 1400px;
            margin: 30px auto;
            padding: 0 20px;
        }
        
        h2 {
            color: var(--color-primario);
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
        }
        
        /* Tarjeta de tabla */
        .table-card {
            background: white;
            border-radius: 12px;
            box-shadow: var(--sombra);
            padding: 25px;
            overflow: hidden;
        }
        
        /* Tabla mejorada */
        .table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .table thead th {
            background-color: var(--color-primario);
            color: white;
            padding: 15px;
            border: none;
        }
        
        .table tbody tr {
            transition: background-color 0.2s;
        }
        
        .table tbody tr:hover {
            background-color: rgba(52, 152, 219, 0.05);
        }
        
        .table td {
            padding: 15px;
            vertical-align: middle;
            border-bottom: 1px solid #eee;
        }
        
        /* Botones */
        .btn {
            border-radius: 8px;
            padding: 8px 15px;
            font-weight: 500;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .btn-primary {
            background-color: var(--color-secundario);
            border-color: var(--color-secundario);
        }
        
        /* Estado */
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
        }
        
        .status-active {
            background-color: rgba(40, 167, 69, 0.15);
            color: #28a745;
        }
        
        .status-inactive {
            background-color: rgba(220, 53, 69, 0.15);
            color: #dc3545;
        }
        
        /* Botones de estado */
        .status-btn {
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            padding: 5px;
            border-radius: 50%;
            transition: all 0.2s;
        }
        
        .status-btn:hover {
            background-color: rgba(0,0,0,0.05);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                padding: 15px;
            }
            
            .nav-links {
                flex-direction: column;
                gap: 10px;
                margin-top: 15px;
            }
            
            .table-card {
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <header class="header d-flex flex-wrap justify-content-between align-items-center">
        <div class="logo">
            <a href="./adm-curso.php"><img src="adm-interna/adm-img/felix_dev.jpg" alt="logo institucional"></a>
        </div>
        
        <nav>
            <ul class="nav-links">
                <li><a href="./adm-curso.php"><i class="fas fa-tachometer-alt"></i> Panel de Control</a></li>
                <li><a href="./Inscritos.php"><i class="fas fa-users"></i> Inscritos</a></li>
                <li><a href="./cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <div class="main-container">
        <h2><i class="fas fa-calendar-check"></i> Consulta de Planificación</h2>
        
        <div class="mb-4">
            <a href="planif-11.php" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Atrás
            </a>
        </div>
        
        <div class="table-card">
            <div class="table-responsive">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cursos</th>
                            <th>Status</th>
                            <th>Razón de Deshabilitar</th>
                            <th>Cupo</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Cierre</th>
                            <th>Días Semanas</th>
                            <th>Facilitador</th>
                            <th>Descripción</th>
                            <th>Objetivos</th>
                            <th>Fecha Creación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once("../admin-general/conexion_adm.php");
                        $result = mysqli_query($connection, "SELECT * FROM planificacion");
                        while ($fila = mysqli_fetch_assoc($result)) :
                        ?>
                        <tr>
                            <td><?php echo $fila['id_plani']; ?></td>
                            <td><?php echo obtenerNombreCurso($fila['curso']); ?></td>
                            <td>
                                <span class="status-badge <?php echo $fila['statuss'] == 'Activo' ? 'status-active' : 'status-inactive'; ?>">
                                    <?php echo $fila['statuss']; ?>
                                </span>
                                <form action="status.php">
                                    <input type="hidden" name="id" value="<?php echo $fila['id_plani']; ?>">
                                    <button type="button" class="status-btn" value="Activo" name="status" data-bs-toggle="modal" data-bs-target="#activar<?php echo $fila['id_plani']; ?>">
                                        <i class="fas fa-check-circle text-success"></i>
                                    </button>
                                    <button type="button" class="status-btn" value="no_activo" name="status" data-bs-toggle="modal" data-bs-target="#razon<?php echo $fila['id_plani']; ?>">
                                        <i class="fas fa-times-circle text-danger"></i>
                                    </button>
                                </form>
                            </td>
                            <td><?php echo $fila['razon']; ?></td>
                            <td><?php echo $fila['cupo']; ?></td>
                            <td><?php echo $fila['fecha_inicio']; ?></td>
                            <td><?php echo $fila['fecha_cierre']; ?></td>
                            <td><?php echo $fila['dias_semana']; ?></td>
                            <td><?php echo obtenerNombreFacilitador($fila['facilitador']); ?></td>
                            <td>Ver en Edición</td>
                            <td>Ver en Edición</td>
                            <td><?php echo $fila['fecha_envio']; ?></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="editar-planificacion.php?id_plani=<?php echo $fila['id_plani']; ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $fila['id_plani']; ?>">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <?php include "./activar_plani.php"; ?>
                        <?php include "./modal_razon.php"; ?>
                        <?php include "./eliminar_plani.php"; ?>
                        
                        <?php endwhile; ?>
                        
                        <?php
                        function obtenerNombreFacilitador($idFacilitador) {
                            global $connection;
                            $consultaFacilitador = mysqli_query($connection, "SELECT nombre, apellido FROM persona WHERE id = '$idFacilitador'");
                            $datosFacilitador = mysqli_fetch_assoc($consultaFacilitador);
                            return $datosFacilitador['nombre'] . ' ' . $datosFacilitador['apellido'];
                        }
                        
                        function obtenerNombreCurso($idCurso) {
                            global $connection;
                            $consultaCurso = mysqli_query($connection, "SELECT nombre_curso FROM curso WHERE id_curso = '$idCurso'");
                            $datosCurso = mysqli_fetch_assoc($consultaCurso);
                            return $datosCurso['nombre_curso'];
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- DataTables (opcional) -->
    <script>
        $(document).ready(function() {
            // Efecto hover en botones
            $('.btn').hover(
                function() {
                    $(this).css('transform', 'translateY(-2px)');
                },
                function() {
                    $(this).css('transform', 'translateY(0)');
                }
            );
        });
    </script>
</body>
</html>