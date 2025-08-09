<?php
include_once './conexion_faci.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idPlanificacion = $_POST["idPlanificacion"];

    // Realizamos una consulta para obtener la ID del curso desde la tabla planificacion
    $sql = "SELECT curso FROM planificacion WHERE id_plani = '$idPlanificacion'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row["curso"];
    } else {
        echo "ID de curso no disponible";
    }
}

$connection->close();
?>
