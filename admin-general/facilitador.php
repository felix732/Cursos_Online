<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facilitadores | FDC-ADMIN</title>
    
    <!-- Fuentes Google -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Iconos Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- DataTables para tablas responsivas -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    
    <!-- SweetAlert2 para alertas -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        :root {
            --color-primario: #2c3e50;
            --color-secundario: #3498db;
            --color-accento: #f39c12;
            --color-claro: #ecf0f1;
            --color-oscuro: #2c3e50;
            --color-exito: #27ae60;
            --color-peligro: #e74c3c;
            --sombra: 0 5px 15px rgba(0, 0, 0, 0.1);
            --borde-redondeado: 8px;
            --transicion: all 0.3s ease;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%);
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        /* Cabecera */
        .cabecera {
            background: linear-gradient(135deg, var(--color-primario) 0%, #1a2a3a 100%);
            box-shadow: var(--sombra);
            padding: 0.8rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            color: white;
            transition: var(--transicion);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo img {
            height: 45px;
            transition: var(--transicion);
            border-radius: 50%;
            border: 2px solid var(--color-accento);
        }

        .texto-logo {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(to right, var(--color-accento), var(--color-secundario));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: 1px;
        }

        .texto-logo span {
            color: white;
            -webkit-text-fill-color: white;
        }

        .logo:hover img {
            transform: rotate(10deg) scale(1.1);
        }

        /* Navegación */
        .enlaces-nav {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 1.5rem;
        }

        .enlaces-nav li {
            position: relative;
        }

        .enlaces-nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 0;
            transition: var(--transicion);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .enlaces-nav a:hover {
            color: var(--color-accento);
            transform: translateY(-2px);
        }

        .btn-salir {
            background-color: var(--color-peligro);
            color: white;
            border-radius: var(--borde-redondeado);
            padding: 0.5rem 1rem;
            transition: var(--transicion);
        }

        .btn-salir:hover {
            background-color: #c0392b;
            color: white;
            transform: translateY(-2px);
        }

        /* Contenido principal */
        .contenido-principal {
            padding: 2rem;
        }

        .titulo-pagina {
            color: var(--color-primario);
            font-weight: 700;
            margin-bottom: 2rem;
            text-align: center;
            position: relative;
            padding-bottom: 1rem;
        }

        .titulo-pagina::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, var(--color-secundario), var(--color-accento));
            border-radius: 2px;
        }

        /* Tabla */
        .contenedor-tabla {
            background-color: white;
            border-radius: var(--borde-redondeado);
            box-shadow: var(--sombra);
            padding: 1.5rem;
            overflow-x: auto;
        }

        .tabla {
            width: 100%;
            margin-bottom: 1rem;
            color: var(--color-oscuro);
        }

        .tabla thead th {
            background-color: var(--color-primario);
            color: white;
            border-bottom: none;
            vertical-align: middle;
        }

        .tabla tbody tr {
            transition: var(--transicion);
        }

        .tabla tbody tr:hover {
            background-color: rgba(52, 152, 219, 0.1);
        }

        .btn-accion {
            padding: 0.375rem 0.75rem;
            border-radius: var(--borde-redondeado);
            transition: var(--transicion);
        }

        .btn-peligro {
            background-color: var(--color-peligro);
            border-color: var(--color-peligro);
        }

        .btn-peligro:hover {
            background-color: #c0392b;
            border-color: #c0392b;
            transform: translateY(-2px);
        }

        .btn-primario {
            background-color: var(--color-secundario);
            border-color: var(--color-secundario);
        }

        .btn-primario:hover {
            background-color: #2980b9;
            border-color: #2980b9;
            transform: translateY(-2px);
        }

        /* Responsivo */
        @media (max-width: 992px) {
            .cabecera {
                flex-direction: column;
                padding: 1rem;
                gap: 1.2rem;
                text-align: center;
            }
            
            .logo {
                justify-content: center;
            }
            
            .enlaces-nav {
                flex-wrap: wrap;
                justify-content: center;
                gap: 1rem;
            }
        }

        @media (max-width: 768px) {
            .enlaces-nav {
                flex-direction: column;
                align-items: center;
                gap: 0.8rem;
            }
            
            .contenido-principal {
                padding: 1rem;
            }
            
            .titulo-pagina {
                font-size: 1.5rem;
            }
            
            .contenedor-tabla {
                padding: 0.5rem;
            }
            
            .tabla thead {
                display: none;
            }
            
            .tabla, .tabla tbody, .tabla tr, .tabla td {
                display: block;
                width: 100%;
            }
            
            .tabla tr {
                margin-bottom: 1rem;
                border-radius: var(--borde-redondeado);
                box-shadow: var(--sombra);
                padding: 0.5rem;
            }
            
            .tabla td {
                text-align: right;
                padding-left: 50%;
                position: relative;
                border-bottom: 1px solid #dee2e6;
            }
            
            .tabla td::before {
                content: attr(data-etiqueta);
                position: absolute;
                left: 1rem;
                width: calc(50% - 1rem);
                padding-right: 1rem;
                text-align: left;
                font-weight: 600;
                color: var(--color-primario);
            }
            
            .tabla td:last-child {
                border-bottom: 0;
                text-align: center;
                padding-left: 1rem;
            }
            
            .tabla td:last-child::before {
                display: none;
            }
        }
    </style>
</head>

<body>
    <header class="cabecera">
        <div class="logo">
            <a href="./adm-curso.php"><img src="adm-interna/adm-img/felix_dev.jpg" alt="logo FDC-ADMIN"></a>
            <div class="texto-logo">FDC-<span>ADMIN</span></div>
        </div>
        
        <nav>
            <ul class="enlaces-nav">
                <li><a href="./cerrar_sesion.php" class="btn btn-salir"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <div class="contenido-principal">
        <h1 class="titulo-pagina">Registro de Facilitadores</h1>
        
        <div class="text-center mb-4">
            <a href="adm-curso.php" class="btn btn-primario"><i class="fas fa-arrow-left"></i> Volver</a>
        </div>
        
        <div class="contenedor-tabla">
            <table class="tabla table-hover" id="tablaFacilitadores">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cédula</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Teléfono</th>
                        <th>Usuario</th>
                        <th>Correo</th>
                        <th>Curso</th>
                        <th>Fecha de Registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once './conexion_adm.php';
                    $resultado = mysqli_query($connection, "SELECT p.id, p.cedula, p.nombre, p.apellido, p.telefono, p.usuario, p.clave, p.correo, c.nombre_curso AS nombre_curso, ia.fecha_envio FROM persona p INNER JOIN informacion_academica ia ON p.id = ia.id_persona INNER JOIN curso c ON ia.id_curso = c.id_curso WHERE ia.estado <> 'PENDIENTE'");

                    while ($fila = mysqli_fetch_assoc($resultado)) :
                    ?>
                    <tr>
                        <td data-etiqueta="ID"><?php echo $fila['id']; ?></td>
                        <td data-etiqueta="Cédula"><?php echo $fila['cedula']; ?></td>
                        <td data-etiqueta="Nombre"><?php echo $fila['nombre']; ?></td>
                        <td data-etiqueta="Apellido"><?php echo $fila['apellido']; ?></td>
                        <td data-etiqueta="Teléfono"><?php echo $fila['telefono']; ?></td>
                        <td data-etiqueta="Usuario"><?php echo $fila['usuario']; ?></td>
                        <td data-etiqueta="Correo"><?php echo $fila['correo']; ?></td>
                        <td data-etiqueta="Curso"><?php echo $fila['nombre_curso']; ?></td>
                        <td data-etiqueta="Fecha Registro"><?php echo $fila['fecha_envio']; ?></td>
                        <td>
                            <button type="button" class="btn btn-peligro btn-accion" data-toggle="modal" data-target="#eliminar<?php echo $fila['id']; ?>">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </button>
                        </td>
                    </tr>
                    <?php include "borrar_facilitador.php"; ?>
                    <?php endwhile; ?>
                </tbody>
            </table>
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
        // Inicializar DataTable
        $(document).ready(function() {
            $('#tablaFacilitadores').DataTable({
                responsive: true,
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
            
            // Confirmación antes de eliminar
            $('.btn-peligro').on('click', function(e) {
                e.preventDefault();
                const formulario = $(this).closest('form');
                
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esta acción!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((resultado) => {
                    if (resultado.isConfirmed) {
                        formulario.submit();
                    }
                });
            });
        });
    </script>
</body>
</html>