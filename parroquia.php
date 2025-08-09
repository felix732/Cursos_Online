<?php
include_once 'conexion.php';

if (isset($_GET['municipio'])) {
    $municipio_id = $_GET['municipio'];

    $query = mysqli_query($connection, "SELECT * FROM parroquia WHERE municipio = $municipio_id");

    $parroquia = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $parroquia[] = $row;
    }

    echo json_encode($parroquia);
} else {
    echo json_encode(array());
}
?>
