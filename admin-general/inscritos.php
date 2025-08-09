<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscritos</title>
    
    <!-- Fuentes Google -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Iconos Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        :root {
            --color-primario: #2c3e50;
            --color-secundario: #3498db;
            --color-fondo: #f8f9fa;
            --color-exito: #28a745;
            --color-peligro: #dc3545;
            --color-advertencia: #ffc107;
            --sombra: 0 4px 6px rgba(0, 0, 0, 0.1);
            --borde-redondeado: 8px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--color-fondo);
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Cabecera */
        .cabecera {
            background: linear-gradient(135deg, var(--color-primario) 0%, #1a2a3a 100%);
            box-shadow: var(--sombra);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo img {
            height: 50px;
            width: 50px;
            border-radius: 50%;
            border: 2px solid var(--color-secundario);
            object-fit: cover;
            transition: all 0.3s ease;
        }

        .logo img:hover {
            transform: scale(1.1);
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 1.5rem;
            margin: 0;
            padding: 0;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-links a:hover {
            color: var(--color-secundario);
            transform: translateY(-2px);
        }

        /* Contenido principal */
        .contenedor-principal {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .titulo-principal {
            color: var(--color-primario);
            font-weight: 600;
            margin-bottom: 2rem;
            text-align: center;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .titulo-principal::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(90deg, var(--color-secundario), var(--color-primario));
        }

        /* Tarjeta de tabla */
        .tarjeta-tabla {
            background-color: white;
            border-radius: var(--borde-redondeado);
            box-shadow: var(--sombra);
            padding: 1.5rem;
            overflow: hidden;
            position: relative;
        }

        /* Barra de búsqueda */
        .barra-busqueda {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            width: 250px;
        }

        /* Botones */
        .btn {
            border-radius: var(--borde-redondeado);
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--sombra);
        }

        .btn-primary {
            background-color: var(--color-primario);
            border-color: var(--color-primario);
        }

        .btn-danger {
            background-color: var(--color-peligro);
            border-color: var(--color-peligro);
        }

        /* Tabla */
        .tabla-inscritos thead th {
            background-color: var(--color-primario);
            color: white;
            border: none;
            padding: 1rem;
        }

        .tabla-inscritos tbody tr {
            transition: all 0.3s ease;
        }

        .tabla-inscritos tbody tr:hover {
            background-color: rgba(52, 152, 219, 0.05);
        }

        .tabla-inscritos td {
            vertical-align: middle;
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
            
            .contenedor-principal {
                padding: 1rem;
            }
            
            .barra-busqueda {
                position: static;
                width: 100%;
                margin-bottom: 1rem;
            }
        }
    </style>
</head>

<body>
    <header class="cabecera">
        <div class="logo">
            <a href="./adm-curso.php"><img src="adm-interna/adm-img/felix_dev.jpg" alt="logo institucional"></a>
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="./consulta_plani.php"><i class="fas fa-calendar-check"></i> Consulta de Planificación</a></li>
                <li><a href="./cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <div class="contenedor-principal">
        <h1 class="titulo-principal">Inscritos</h1>
        
        <div class="tarjeta-tabla">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="adm-curso.php" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> Atrás
                </a>
                <div class="barra-busqueda">
                    <input type="text" class="form-control" id="searchInput" placeholder="Buscar...">
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table tabla-inscritos table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Aspirante</th>
                            <th>Curso</th>
                            <th>Fecha de Inscripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once("../admin-general/conexion_adm.php");
                        $result = mysqli_query($connection, "SELECT * FROM inscritos");

                        while ($fila = mysqli_fetch_assoc($result)) :
                            $aspirante_id = $fila['id_persona'];
                            
                            $aspirante_query = mysqli_query($connection, "SELECT nombre, apellido FROM persona WHERE id = '$aspirante_id'");
                            $aspirante_info = mysqli_fetch_assoc($aspirante_query);
                            $nombre_aspirante = $aspirante_info['nombre'];
                            $apellido_aspirante = $aspirante_info['apellido'];

                            $id_planificacion = $fila['id_planificacion'];
                            $curso_query = mysqli_query($connection, "SELECT nombre_curso FROM curso WHERE id_curso IN (SELECT curso FROM planificacion WHERE id_plani = '$id_planificacion')");
                            $curso = mysqli_fetch_assoc($curso_query);
                            $nombre_curso = $curso['nombre_curso'];
                        ?>
                            <tr>
                                <td><?php echo $fila['id_inscripcion']; ?></td>
                                <td><?php echo $nombre_aspirante . ' ' . $apellido_aspirante; ?></td>
                                <td><?php echo $nombre_curso; ?></td>
                                <td><?php echo $fila['fecha_inscripcion']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $fila['id_inscripcion']; ?>">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </button>
                                </td>
                            </tr>
                            <?php include "borrar_ins.php"; ?>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        $(document).ready(function() {
            // Inicializar DataTable con búsqueda
            var table = $('#dataTable').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
                },
                dom: '<"top"f>rt<"bottom"lip><"clear">',
                initComplete: function() {
                    $('#searchInput').remove();
                    $('.dataTables_filter input').addClass('form-control');
                    $('.dataTables_length select').addClass('form-select');
                }
            });

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