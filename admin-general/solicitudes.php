<?php
include_once './conexion_adm.php';

if (!$connection) {
    die("Error de conexión: " . mysqli_connect_error());
}

$sql = "SELECT * FROM informacion_academica WHERE estado <> 'ACEPTADA'";
$resultado = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitudes de Trabajo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #f39c12;
            --light-color: #ecf0f1;
            --success-color: #27ae60;
            --danger-color: #e74c3c;
            --warning-color: #f39c12;
            --border-radius: 8px;
            --box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            max-width: 1200px;
            padding: 20px;
        }

        .header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #1a2a3a 100%);
            color: white;
            padding: 15px 0;
            margin-bottom: 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }

        .header h2 {
            font-weight: 600;
            margin: 0;
            padding-left: 20px;
        }

        .btn-back {
            background-color: var(--primary-color);
            color: white;
            border: none;
            transition: var(--transition);
            margin-bottom: 20px;
        }

        .btn-back:hover {
            background-color: #1a2a3a;
            transform: translateY(-2px);
        }

        .table-container {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
            padding: 20px;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background-color: var(--primary-color);
            color: white;
            font-weight: 500;
            border: none;
        }

        .table tbody tr {
            transition: var(--transition);
        }

        .table tbody tr:hover {
            background-color: rgba(52, 152, 219, 0.1);
        }

        .btn-action {
            padding: 6px 12px;
            font-size: 14px;
            border-radius: 4px;
            transition: var(--transition);
            margin: 2px;
        }

        .btn-accept {
            background-color: var(--success-color);
            border-color: var(--success-color);
        }

        .btn-reject {
            background-color: var(--danger-color);
            border-color: var(--danger-color);
        }

        .btn-download {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .status-pending {
            background-color: rgba(243, 156, 18, 0.2);
            font-weight: 500;
            color: var(--warning-color);
            padding: 3px 8px;
            border-radius: 4px;
        }

        .badge {
            font-size: 12px;
            font-weight: 500;
            padding: 5px 10px;
            border-radius: 4px;
        }

        .badge-pending {
            background-color: var(--warning-color);
        }

        .badge-accepted {
            background-color: var(--success-color);
        }

        .badge-rejected {
            background-color: var(--danger-color);
        }

        @media (max-width: 768px) {
            .table-responsive {
                overflow-x: auto;
            }
            
            .btn-action {
                display: block;
                width: 100%;
                margin-bottom: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header d-flex justify-content-between align-items-center">
            <h2><i class="fas fa-briefcase me-2"></i>Solicitudes de Trabajo</h2>
            <a href="adm-curso.php" class="btn btn-back">
                <i class="fas fa-arrow-left me-2"></i>Volver
            </a>
        </div>

        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th><i class="fas fa-id-card me-2"></i>ID</th>
                            <th><i class="fas fa-user me-2"></i>Nombre</th>
                            <th><i class="fas fa-user me-2"></i>Apellido</th>
                            <th><i class="fas fa-info-circle me-2"></i>Estado</th>
                            <th><i class="fas fa-file-pdf me-2"></i>Curriculum</th>
                            <th><i class="fas fa-book me-2"></i>Curso</th>
                            <th><i class="fas fa-calendar-day me-2"></i>Fecha</th>
                            <th><i class="fas fa-cogs me-2"></i>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($resultado) {
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                $estado = $fila['estado'];
                                $badgeClass = '';
                                if ($estado == 'PENDIENTE') {
                                    $badgeClass = 'badge bg-warning text-dark';
                                } elseif ($estado == 'ACEPTADA') {
                                    $badgeClass = 'badge bg-success';
                                } else {
                                    $badgeClass = 'badge bg-danger';
                                }
                                
                                echo "<tr>";
                                echo "<td>" . $fila['id'] . "</td>";

                                // Obtener y mostrar el nombre y apellido del facilitador
                                $idFacilitador = $fila['id_persona'];
                                $idCurso = $fila['id_curso'];
                                $consultarCurso = "SELECT nombre_curso FROM curso WHERE id_curso = $idCurso";
                                $consultaFacilitador = "SELECT nombre, apellido FROM persona WHERE id = $idFacilitador";
                                $resultadoFacilitador = mysqli_query($connection, $consultaFacilitador);
                                $resultadoCurso = mysqli_query($connection, $consultarCurso);
                                $informacionFacilitador = mysqli_fetch_assoc($resultadoFacilitador);
                                $informacionCurso = mysqli_fetch_assoc($resultadoCurso);

                                echo "<td>" . htmlspecialchars($informacionFacilitador['nombre']) . "</td>";
                                echo "<td>" . htmlspecialchars($informacionFacilitador['apellido']) . "</td>";

                                echo "<td><span class='$badgeClass'>$estado</span></td>";
                                echo '<td><a href="../admin-general/descargar_curri.php?id=' . $fila['id'] . '" class="btn btn-download btn-sm text-white">
                                    <i class="fas fa-download me-1"></i>Descargar</a></td>';
                                echo "<td>" . htmlspecialchars($informacionCurso['nombre_curso']) . "</td>";
                                echo "<td>" . date('d/m/Y', strtotime($fila['fecha_envio'])) . "</td>";
                                echo '<td class="d-flex">';
                                echo '<a href="aceptar_soli.php?id=' . $fila['id'] . '" class="btn btn-accept btn-action text-white me-2">
                                    <i class="fas fa-check me-1"></i>Aceptar</a>';
                                echo '<a href="rechazar_soli.php?id=' . $fila['id'] . '" class="btn btn-reject btn-action text-white">
                                    <i class="fas fa-times me-1"></i>Rechazar</a>';
                                echo '</td>';
                                echo "</tr>";

                                mysqli_free_result($resultadoFacilitador);
                            }
                            mysqli_free_result($resultado);
                        } else {
                            echo "<tr><td colspan='8' class='text-center text-danger'>Error al obtener las solicitudes: " . htmlspecialchars(mysqli_error($connection)) . "</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include "./consultar_curso_modal.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Efecto hover para las filas
            $('.table tbody tr').hover(
                function() {
                    $(this).css('transform', 'translateY(-2px)');
                    $(this).css('box-shadow', '0 4px 8px rgba(0,0,0,0.1)');
                },
                function() {
                    $(this).css('transform', '');
                    $(this).css('box-shadow', '');
                }
            );
        });
    </script>
</body>
</html>