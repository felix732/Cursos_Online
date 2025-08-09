<?php
require_once("conexion_adm.php");

// Verificar si el formulario se ha enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_persona = $_POST['id_persona'];

    $nuevo_curso_id = $_POST['curso_id'];
    $update_query = "UPDATE informacion_academica SET id_curso = '$nuevo_curso_id' WHERE id_persona = '$id_persona'";
    $resultado = mysqli_query($connection, $update_query);

    if ($resultado) {
        echo "Actualización exitosa. Redirigiendo...";
        header("refresh:2;url=facilitador.php");
        exit();
    } else {
        echo "Error en la actualización.";
    }
}
?>
