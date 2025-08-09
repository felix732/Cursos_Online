<?php
include_once './conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idCurso = $_POST["idCurso"];

    // Realizamos una consulta para obtener el nombre del curso desde la tabla curso
    $sql = "SELECT nombre_curso FROM curso WHERE id_curso = '$idCurso'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row["nombre_curso"];
    } else {
        echo "Nombre de curso no disponible";
    }
}

$connection->close();
?>
