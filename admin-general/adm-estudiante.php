<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Personas | Felix_DEV</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #f39c12;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
            --success-color: #27ae60;
            --danger-color: #e74c3c;
            --box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            --border-radius: 8px;
            --transition: all 0.3s ease;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        /* Header */
        .header {
            background-color: white;
            box-shadow: var(--box-shadow);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo img {
            height: 50px;
            transition: var(--transition);
        }

        .logo img:hover {
            transform: scale(1.1);
        }

        .nav-links {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 1.5rem;
        }

        .nav-links a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-links a:hover {
            color: var(--secondary-color);
        }

        /* Main Content */
        .page-title {
            color: var(--primary-color);
            text-align: center;
            margin: 2rem 0;
            font-weight: 600;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .page-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background-color: var(--accent-color);
        }

        .container-main {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        /* Search and Actions */
        .search-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .search-box {
            flex-grow: 1;
            max-width: 400px;
        }

        .search-box .form-control {
            border-radius: var(--border-radius);
            padding: 0.5rem 1rem;
            border: 1px solid #ddd;
            transition: var(--transition);
        }

        .search-box .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            border-radius: var(--border-radius);
            padding: 0.5rem 1.25rem;
            font-weight: 500;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-success {
            background-color: var(--success-color);
            border-color: var(--success-color);
        }

        .btn-success:hover {
            background-color: #219653;
            border-color: #219653;
            transform: translateY(-2px);
        }

        .btn-primary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
            transform: translateY(-2px);
        }

        /* Table */
        .table-container {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
            padding: 1rem;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: var(--dark-color);
        }

        .table th {
            background-color: var(--primary-color);
            color: white;
            font-weight: 500;
            padding: 1rem;
            text-align: left;
        }

        .table td {
            padding: 0.75rem 1rem;
            vertical-align: middle;
            border-top: 1px solid #eee;
        }

        .table tr:hover {
            background-color: rgba(52, 152, 219, 0.05);
        }

        /* Action Buttons */
        .btn-action {
            padding: 0.35rem 0.7rem;
            border-radius: var(--border-radius);
            transition: var(--transition);
        }

        .btn-warning {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            color: white;
        }

        .btn-warning:hover {
            background-color: #e67e22;
            border-color: #e67e22;
            color: white;
            transform: translateY(-2px);
        }

        .btn-danger {
            background-color: var(--danger-color);
            border-color: var(--danger-color);
            color: white;
        }

        .btn-danger:hover {
            background-color: #c0392b;
            border-color: #c0392b;
            color: white;
            transform: translateY(-2px);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .header {
                flex-direction: column;
                padding: 1rem;
                gap: 1rem;
            }
            
            .nav-links {
                justify-content: center;
                flex-wrap: wrap;
            }
            
            .search-actions {
                flex-direction: column;
                align-items: stretch;
            }
            
            .search-box {
                max-width: 100%;
            }
            
            .action-buttons {
                justify-content: flex-end;
            }
        }

        @media (max-width: 768px) {
            .table-responsive {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
            
            .table th, .table td {
                white-space: nowrap;
            }
            
            .btn {
                padding: 0.5rem;
                font-size: 0.85rem;
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="logo">
            <a href="./adm-curso.php"><img src="adm-interna/adm-img/felix_dev.jpg" alt="logo institucional"></a>
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="./cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <div class="container-main">
        <h2 class="page-title">Personas Registradas</h2>
        
        <div class="search-actions">
            <div class="search-box">
                <input type="text" class="form-control" id="searchInput" placeholder="Buscar persona...">
            </div>
            <div class="action-buttons">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar">
                    <i class="fas fa-user-plus"></i> Agregar Persona
                </button>
                <a href="adm-curso.php" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>

        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Seg. Nombre</th>
                            <th>Apellido</th>
                            <th>Seg. Apellido</th>
                            <th>Teléfono</th>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th>Dirección</th>
                            <th>ROL</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once("../admin-general/conexion_adm.php");
                        $result = mysqli_query($connection, "SELECT 
                            p.id,
                            p.cedula,
                            p.nombre,
                            p.seg_nombre,
                            p.apellido,
                            p.seg_apellido,
                            p.telefono,
                            p.sexo,
                            p.usuario,
                            p.clave,
                            p.correo,
                            p.fecha_nac,
                            p.parroquia,
                            p.direccion,
                            r.rol AS rol,
                            p.cedula_rep,
                            p.nombre_rep,
                            p.apellido_rep
                        FROM persona p
                        INNER JOIN roles r ON p.id_rol = r.id
                        WHERE p.id_rol NOT IN (1)
                        ");
                        while ($fila = mysqli_fetch_assoc($result)) :
                        ?>
                            <tr>
                                <td><?php echo $fila['id'] ?></td>
                                <td><?php echo $fila['cedula'] ?></td>
                                <td><?php echo $fila['nombre'] ?></td>
                                <td><?php echo $fila['seg_nombre'] ?></td>
                                <td><?php echo $fila['apellido'] ?></td>
                                <td><?php echo $fila['seg_apellido'] ?></td>
                                <td><?php echo $fila['telefono'] ?></td>
                                <td><?php echo $fila['usuario'] ?></td>
                                <td><?php echo $fila['correo'] ?></td>
                                <td><?php echo $fila['direccion'] ?></td>
                                <td><?php echo $fila['rol'] ?></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="editar_persona.php?id=<?php echo $fila['id']; ?>" class="btn btn-warning btn-action" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="borrar_estudiante.php?id=<?php echo $fila['id']; ?>" 
                                           class="btn btn-danger btn-action" 
                                           title="Eliminar"
                                           onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include "agregar_estudiante.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // Función para búsqueda en tiempo real
            $('#searchInput').on('input', function() {
                var searchTerm = $(this).val().toLowerCase();
                $('#dataTable tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(searchTerm) > -1);
                });
            });
        });
    </script>
</body>
</html>