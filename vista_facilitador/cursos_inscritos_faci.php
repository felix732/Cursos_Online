<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: iniciar_sesion.php");
    exit();
}

include_once './conexion_faci.php';

// Obtener datos del usuario
$usuario_id = $_SESSION['id'];
$sql_usuario = "SELECT * FROM persona WHERE id = '$usuario_id'";
$result_usuario = $connection->query($sql_usuario);
$datos_usuario = $result_usuario->fetch_assoc();

// Obtener cursos que imparte el facilitador
$sql_cursos = "SELECT p.id_plani, c.nombre_curso, p.fecha_inicio, p.fecha_cierre, p.statuss 
               FROM planificacion p 
               JOIN curso c ON p.curso = c.id_curso 
               WHERE p.facilitador = '$usuario_id'";
$result_cursos = $connection->query($sql_cursos);

// Procesar actualización de datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['actualizar_perfil'])) {
        $nuevo_usuario = $connection->real_escape_string($_POST['usuario']);
        $nueva_clave = !empty($_POST['clave']) ? password_hash($connection->real_escape_string($_POST['clave']), PASSWORD_DEFAULT) : null;
        
        $sql_update = "UPDATE persona SET usuario = '$nuevo_usuario'";
        if ($nueva_clave) {
            $sql_update .= ", clave = '$nueva_clave'";
        }
        $sql_update .= " WHERE id = '$usuario_id'";
        
        if ($connection->query($sql_update)) {
            $_SESSION['usuario'] = $nuevo_usuario;
            $mensaje = "Perfil actualizado correctamente";
            $tipo_mensaje = "success";
        } else {
            $mensaje = "Error al actualizar el perfil: " . $connection->error;
            $tipo_mensaje = "danger";
        }
    }
    
    // Procesar actualización de foto de perfil
    if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] == 0) {
        $permitidos = ['jpg', 'jpeg', 'png', 'gif'];
        $extension = strtolower(pathinfo($_FILES['foto_perfil']['name'], PATHINFO_EXTENSION));
        
        if (in_array($extension, $permitidos)) {
            $nombre_archivo = 'perfil_' . $usuario_id . '.' . $extension;
            $ruta_destino = 'img/perfiles/' . $nombre_archivo;
            
            if (move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $ruta_destino)) {
                $sql_foto = "UPDATE persona SET foto_perfil = '$nombre_archivo' WHERE id = '$usuario_id'";
                if ($connection->query($sql_foto)) {
                    $mensaje_foto = "Foto de perfil actualizada correctamente";
                    $tipo_mensaje_foto = "success";
                } else {
                    $mensaje_foto = "Error al actualizar la foto en la base de datos";
                    $tipo_mensaje_foto = "danger";
                }
            } else {
                $mensaje_foto = "Error al subir el archivo";
                $tipo_mensaje_foto = "danger";
            }
        } else {
            $mensaje_foto = "Formato de archivo no permitido";
            $tipo_mensaje_foto = "danger";
        }
    }
}

// Cerrar conexión
$connection->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Facilitador | Felix DEV</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            --nav-height: 70px;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: var(--bg-gradient);
            color: var(--text-color);
        }
        
        .profile-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px;
        }
        
        .profile-header {
            background: white;
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            padding: 30px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-right: 30px;
        }
        
        .profile-info h2 {
            font-family: 'Montserrat', sans-serif;
            color: var(--secondary-color);
            margin-bottom: 5px;
        }
        
        .profile-info p {
            color: var(--text-light);
            margin-bottom: 15px;
        }
        
        .badge-facilitador {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        .profile-card {
            background: white;
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            padding: 25px;
            margin-bottom: 30px;
        }
        
        .profile-card h3 {
            font-family: 'Montserrat', sans-serif;
            color: var(--dark-color);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--light-color);
        }
        
        .form-label {
            font-weight: 500;
            color: var(--dark-color);
        }
        
        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        }
        
        .btn-primary {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background: linear-gradient(to right, var(--secondary-color), var(--primary-color));
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(67, 97, 238, 0.4);
        }
        
        .course-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border-left: 4px solid var(--primary-color);
        }
        
        .course-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }
        
        .course-title {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 5px;
        }
        
        .course-dates {
            font-size: 0.9rem;
            color: var(--text-light);
        }
        
        .status-badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
            margin-right: 10px;
        }
        
        .status-active {
            background-color: var(--success-color);
            color: white;
        }
        
        .status-inactive {
            background-color: var(--danger-color);
            color: white;
        }
        
        .status-pending {
            background-color: var(--warning-color);
            color: var(--dark-color);
        }
        
        .file-upload {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }
        
        .file-upload-btn {
            background: linear-gradient(to right, var(--accent-color), #3a86ff);
            color: white;
            padding: 8px 20px;
            border-radius: 8px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .file-upload-btn:hover {
            background: linear-gradient(to right, #3a86ff, var(--accent-color));
        }
        
        .file-upload-input {
            position: absolute;
            font-size: 100px;
            opacity: 0;
            right: 0;
            top: 0;
            cursor: pointer;
        }
        
        @media (max-width: 768px) {
            .profile-header {
                flex-direction: column;
                text-align: center;
            }
            
            .profile-picture {
                margin-right: 0;
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="profile-container">
        <!-- Header del perfil -->
        <div class="profile-header">
            <img src="<?php echo !empty($datos_usuario['foto_perfil']) ? 'img/perfiles/'.$datos_usuario['foto_perfil'] : 'https://ui-avatars.com/api/?name='.urlencode($datos_usuario['nombre'].'+'.$datos_usuario['apellido']).'&size=150'; ?>" 
                 alt="Foto de perfil" class="profile-picture">
            <div class="profile-info">
                <h2><?php echo $datos_usuario['nombre'] . ' ' . $datos_usuario['apellido']; ?></h2>
                <p><i class="fas fa-envelope"></i> <?php echo $datos_usuario['correo']; ?></p>
                <p><i class="fas fa-phone"></i> <?php echo $datos_usuario['telefono']; ?></p>
                <span class="badge-facilitador"><i class="fas fa-chalkboard-teacher"></i> FACILITADOR</span>
            </div>
        </div>
        
        <div class="row">
            <!-- Columna izquierda - Editar perfil -->
            <div class="col-md-6">
                <div class="profile-card">
                    <h3><i class="fas fa-user-edit"></i> Editar Perfil</h3>
                    
                    <?php if(isset($mensaje)): ?>
                    <div class="alert alert-<?php echo $tipo_mensaje; ?>">
                        <?php echo $mensaje; ?>
                    </div>
                    <?php endif; ?>
                    
                    <?php if(isset($mensaje_foto)): ?>
                    <div class="alert alert-<?php echo $tipo_mensaje_foto; ?>">
                        <?php echo $mensaje_foto; ?>
                    </div>
                    <?php endif; ?>
                    
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Nombre de usuario</label>
                            <input type="text" class="form-control" name="usuario" value="<?php echo $datos_usuario['usuario']; ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Cambiar contraseña (dejar vacío para no cambiar)</label>
                            <input type="password" class="form-control" name="clave" placeholder="Nueva contraseña">
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label">Foto de perfil</label>
                            <div class="file-upload">
                                <button type="button" class="file-upload-btn"><i class="fas fa-camera"></i> Cambiar foto</button>
                                <input type="file" class="file-upload-input" name="foto_perfil" accept="image/*">
                            </div>
                        </div>
                        
                        <button type="submit" name="actualizar_perfil" class="btn btn-primary">
                            <i class="fas fa-save"></i> Guardar cambios
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Columna derecha - Cursos que imparte -->
            <div class="col-md-6">
                <div class="profile-card">
                    <h3><i class="fas fa-book-open"></i> Cursos que imparto</h3>
                    
                    <?php if ($result_cursos->num_rows > 0): ?>
                        <?php while($curso = $result_cursos->fetch_assoc()): ?>
                            <div class="course-card">
                                <div class="course-title"><?php echo $curso['nombre_curso']; ?></div>
                                <div class="course-dates">
                                    <span class="status-badge <?php 
                                        echo $curso['statuss'] == 'Activo' ? 'status-active' : 
                                            ($curso['statuss'] == 'no_activo' ? 'status-inactive' : 'status-pending'); 
                                    ?>">
                                        <?php echo $curso['statuss']; ?>
                                    </span>
                                    <?php echo date('d/m/Y', strtotime($curso['fecha_inicio'])); ?> - <?php echo date('d/m/Y', strtotime($curso['fecha_cierre'])); ?>
                                </div>
                                <a href="./a01_vista_faci.php" class="btn btn-sm btn-primary mt-2">
                                    <i class="fas fa-eye"></i> Ver curso
                                </a>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <div class="alert alert-info">
                            Actualmente no estás impartiendo ningún curso.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mostrar nombre del archivo seleccionado
        document.querySelector('.file-upload-input').addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name || 'Ningún archivo seleccionado';
            const button = document.querySelector('.file-upload-btn');
            
            if(e.target.files.length > 0) {
                button.innerHTML = `<i class="fas fa-check"></i> ${fileName}`;
                button.style.background = "linear-gradient(to right, #38b000, #32a852)";
            } else {
                button.innerHTML = `<i class="fas fa-camera"></i> Cambiar foto`;
                button.style.background = "linear-gradient(to right, var(--accent-color), #3a86ff)";
            }
        });
        
        // Mostrar alerta si hay mensajes
        <?php if(isset($mensaje)): ?>
        Swal.fire({
            icon: '<?php echo $tipo_mensaje == "success" ? "success" : "error"; ?>',
            title: '<?php echo $mensaje; ?>',
            showConfirmButton: false,
            timer: 2000
        });
        <?php endif; ?>
        
        <?php if(isset($mensaje_foto)): ?>
        Swal.fire({
            icon: '<?php echo $tipo_mensaje_foto == "success" ? "success" : "error"; ?>',
            title: '<?php echo $mensaje_foto; ?>',
            showConfirmButton: false,
            timer: 2000
        });
        <?php endif; ?>
    </script>
</body>
</html>