<?php
include_once 'conexion_ve.php';

if (isset($_GET['estado'])) {
    $estado_id = $_GET['estado'];

    $query = mysqli_query($connection, "SELECT * FROM municipio WHERE estado = $estado_id");

    $municipios = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $municipios[] = $row;
    }

    echo json_encode($municipios);
} else {
    echo json_encode(array());
}
?>
