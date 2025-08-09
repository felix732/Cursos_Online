<?php

session_start();
include './conexion.php';

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['usuario'])) {
    // Obtener el nombre del curso inscrito
    $cursoInscrito = "Comunicacion Para Ti";
    $curso = $_POST['curso'];

    // Insertar el curso inscrito en la base de datos
    $sql = "INSERT INTO persona (usuario, curso) VALUES ('{$_SESSION['usuario']}', '$cursoInscrito')";

    if (mysqli_query($connection, $sql)) {
        echo "El curso ha sido inscrito correctamente.";
    } else {
        echo "Error al inscribir el curso: " . mysqli_error($connection);
    }
} else {
    echo "Debes iniciar sesión para inscribirte en el curso.";
}
?>
