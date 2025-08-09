<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Cursos</title>
    
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
        }

        /* Cabecera */
        .cabecera {
            background: linear-gradient(135deg, var(--color-primario) 0%, #1a2a3a 100%);
            box-shadow: var(--sombra);
            padding: 1rem 2rem;
        }

        .logo img {
            height: 50px;
            width: 50px;
            border-radius: 50%;
            border: 2px solid var(--color-secundario);
            object-fit: cover;
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

        .btn-success {
            background-color: var(--color-exito);
            border-color: var(--color-exito);
        }

        .btn-warning {
            background-color: var(--color-advertencia);
            border-color: var(--color-advertencia);
            color: #212529;
        }

        .btn-danger {
            background-color: var(--color-peligro);
            border-color: var(--color-peligro);
        }

        /* Tabla */
        .tabla-cursos thead th {
            background-color: var(--color-primario);
            color: white;
            border: none;
            padding: 1rem;
        }

        .tabla-cursos tbody tr {
            transition: all 0.3s ease;
        }

        .tabla-cursos tbody tr:hover {
            background-color: rgba(52, 152, 219, 0.05);
        }

        .tabla-cursos td {
            vertical-align: middle;
        }

        .acciones {
            display: flex;
            gap: 0.5rem;
        }

        /* Modal */
        .modal-header {
            background: linear-gradient(135deg, var(--color-primario) 0%, #1a2a3a 100%);
            color: white;
            border-bottom: none;
        }

        .modal-content {
            border-radius: var(--borde-redondeado);
            border: none;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
        }

        /* Responsivo */
        @media (max-width: 768px) {
            .cabecera {
                padding: 1rem;
            }
            
            .nav-links {
                flex-direction: column;
                gap: 0.8rem;
            }
            
            .contenedor-principal {
                padding: 1rem;
            }
            
            .acciones {
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .acciones .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <header class="cabecera">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="./adm-curso.php"><img src="adm-interna/adm-img/felix_dev.jpg" alt="logo institucional"></a>
            </div>
            <nav>
                <ul class="nav-links">
                    <li><a href="adm-curso.php"><i class="fas fa-tachometer-alt"></i> Panel Control</a></li>
                    <li><a href="planif-11.php"><i class="fas fa-calendar-alt"></i> Planificación</a></li>
                    <li><a href="../cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="contenedor-principal">
        <h1 class="titulo-principal">Gestión de Cursos</h1>
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregar">
                <i class="fas fa-plus-circle"></i> Agregar Curso
            </button>
        </div>

        <div class="tarjeta-tabla">
            <div class="table-responsive">
                <table class="table tabla-cursos table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre Curso</th>
                            <th>Categoría</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once("../admin-general/conexion_adm.php");
                        $result = mysqli_query($connection, "SELECT * FROM curso");
                        while ($fila = mysqli_fetch_assoc($result)):
                        ?>
                            <tr>
                                <td><?php echo $fila['id_curso']; ?></td>
                                <td><?php echo $fila['nombre_curso']; ?></td>
                                <td><?php echo $fila['categoria_curso']; ?></td>
                                <td>
                                    <div class="acciones">
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editar<?php echo $fila['id_curso']; ?>">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $fila['id_curso']; ?>">
                                            <i class="fas fa-trash-alt"></i> Eliminar
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php include "editar_curso.php"; ?>
                            <?php include "eliminar_curso.php"; ?>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include "form-curso.php"; ?>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        $(document).ready(function() {
            // Inicializar DataTable
            $('#dataTable').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
                },
                dom: '<"top"f>rt<"bottom"lip><"clear">',
                initComplete: function() {
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

            // Animación al abrir modal
            $('.modal').on('show.bs.modal', function () {
                $(this).find('.modal-content').css({
                    'transform': 'translateY(50px)',
                    'opacity': '0'
                }).animate({
                    'transform': 'translateY(0)',
                    'opacity': '1'
                }, 300);
            });
        });
    </script>
</body>
</html>