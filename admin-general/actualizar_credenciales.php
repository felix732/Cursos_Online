<?php
session_start();
require_once '../conexion.php'; // Asegúrate de que la ruta sea correcta

// Verificar si la conexión a la base de datos está establecida
if (!isset($connection)) {
    die("Error: No se pudo establecer la conexión a la base de datos");
}

// Verificar si el usuario está autenticado
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

// Verificar si la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $usuario_actual = trim($_POST['usuarioActual']);
    $nuevo_usuario = trim($_POST['nuevoUsuario']);
    $clave_actual = trim($_POST['claveActual']);
    $nueva_clave = trim($_POST['nuevaClave']);
    $confirmar_clave = trim($_POST['confirmarClave']);

    // Validaciones básicas
    $errores = [];

    if (empty($usuario_actual)) {
        $errores[] = "El usuario actual es requerido";
    }

    if (empty($nuevo_usuario)) {
        $errores[] = "El nuevo usuario es requerido";
    }

    if (empty($clave_actual)) {
        $errores[] = "La contraseña actual es requerida";
    }

    if (empty($nueva_clave)) {
        $errores[] = "La nueva contraseña es requerida";
    }

    if ($nueva_clave !== $confirmar_clave) {
        $errores[] = "Las contraseñas nuevas no coinciden";
    }

    if (strlen($nueva_clave) < 8) {
        $errores[] = "La nueva contraseña debe tener al menos 8 caracteres";
    }

    // Si hay errores, mostrarlos
    if (!empty($errores)) {
        $_SESSION['errores'] = $errores;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

    try {
        // Obtener el ID del usuario actual desde la sesión
        $usuario_id = $_SESSION['id'];

        // Verificar que la contraseña actual sea correcta
        $sql = "SELECT clave FROM persona WHERE id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $usuario = $result->fetch_assoc();

        if (!$usuario || !password_verify($clave_actual, $usuario['clave'])) {
            $_SESSION['error'] = "La contraseña actual es incorrecta";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }

        // Hash de la nueva contraseña
        $nueva_clave_hash = password_hash($nueva_clave, PASSWORD_DEFAULT);

        // Actualizar usuario y contraseña en la base de datos
        $sql = "UPDATE persona SET usuario = ?, clave = ? WHERE id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssi", $nuevo_usuario, $nueva_clave_hash, $usuario_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // Actualizar el usuario en la sesión si es necesario
            $_SESSION['usuario'] = $nuevo_usuario;
            $_SESSION['mensaje'] = "Credenciales actualizadas correctamente";
        } else {
            $_SESSION['error'] = "No se realizaron cambios o ocurrió un error";
        }

        // Redireccionar de vuelta
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();

    } catch (Exception $e) {
        // Manejar error de base de datos
        $_SESSION['error'] = "Error al actualizar las credenciales: " . $e->getMessage();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

} else {
    // Si no es POST, redireccionar
    header('Location: index.php');
    exit();
}