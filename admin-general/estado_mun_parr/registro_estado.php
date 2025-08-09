<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Estado</title>
    
    <!-- Fuentes e iconos -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        :root {
            --color-primario: #2c3e50;
            --color-secundario: #3498db;
            --color-exito: #28a745;
            --color-peligro: #dc3545;
            --color-advertencia: #ffc107;
            --color-fondo: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%);
            --sombra: 0 4px 6px rgba(0, 0, 0, 0.1);
            --sombra-hover: 0 8px 15px rgba(0, 0, 0, 0.1);
            --borde-redondeado: 10px;
            --transicion: all 0.3s ease;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--color-fondo);
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        /* Cabecera */
        .header {
            background: white;
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
            transition: var(--transicion);
        }

        .logo img:hover {
            transform: rotate(10deg) scale(1.1);
        }

        .nav-links {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 1.5rem;
        }

        .nav-links a {
            color: var(--color-primario);
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: var(--borde-redondeado);
            transition: var(--transicion);
        }

        .nav-links a:hover {
            background-color: rgba(52, 152, 219, 0.1);
            transform: translateY(-2px);
        }

        /* Contenedor principal */
        .contenedor-principal {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        .titulo-principal {
            color: var(--color-primario);
            font-weight: 600;
            text-align: center;
            margin-bottom: 2rem;
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
            height: 4px;
            background: linear-gradient(90deg, var(--color-secundario), var(--color-primario));
            border-radius: 2px;
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
            transition: var(--transicion);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: var(--sombra-hover);
        }

        .btn-success {
            background-color: var(--color-exito);
            border-color: var(--color-exito);
        }

        .btn-warning {
            background-color: var(--color-advertencia);
            border-color: var(--color-advertencia);
            color: #333;
        }

        .btn-danger {
            background-color: var(--color-peligro);
            border-color: var(--color-peligro);
        }

        /* Tabla */
        .tabla-estados thead th {
            background-color: var(--color-primario);
            color: white;
            border: none;
            padding: 1rem;
        }

        .tabla-estados tbody tr {
            transition: var(--transicion);
        }

        .tabla-estados tbody tr:hover {
            background-color: rgba(52, 152, 219, 0.05);
        }

        .tabla-estados td {
            vertical-align: middle;
        }

        .acciones {
            display: flex;
            gap: 0.5rem;
        }

        /* Responsivo */
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                padding: 1rem;
                gap: 1rem;
            }
            
            .nav-links {
                flex-direction: column;
                gap: 0.8rem;
            }
            
            .contenedor-principal {
                padding: 0 1rem;
            }
            
            .tarjeta-tabla {
                padding: 1rem;
            }
            
            .acciones {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">
            <a href=""><img src="img/felix_dev.jpg" alt="logo institucional"></a>
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="../adm-curso.php"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="registro_municipio.php"><i class="fas fa-map-marker-alt"></i> Registrar Municipio</a></li>
                <li><a href="../cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <div class="contenedor-principal">
        <h1 class="titulo-principal"><i class="fas fa-flag"></i> Registrar Estado</h1>
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregar">
                <i class="fas fa-plus"></i> Agregar Estado
            </button>
        </div>

        <div class="tarjeta-tabla">
            <div class="table-responsive">
                <table class="table tabla-estados table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once("conexion_ve.php");
                        $result = mysqli_query($connection, "SELECT * FROM estado");
                        while ($fila = mysqli_fetch_assoc($result)) :
                        ?>
                            <tr>
                                <td><?php echo $fila['id_estado']; ?></td>
                                <td><?php echo $fila['n_estado']; ?></td>
                                <td>
                                    <div class="acciones">
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editar<?php echo $fila['id_estado']; ?>">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $fila['id_estado']; ?>">
                                            <i class="fas fa-trash-alt"></i> Eliminar
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            
                            <?php include "editar_estado.php"; ?>
                            <?php include "eliminar_estado.php"; ?>
                            
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include "agregar_estado.php"; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        $(document).ready(function() {
            // Efecto hover en botones
            $('.btn').hover(
                function() {
                    $(this).css('transform', 'translateY(-3px)');
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