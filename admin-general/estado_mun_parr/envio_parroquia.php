<?php
include 'conexion_ve.php';
$id_parroquia = $_POST['id'];
$municipio = $_POST['municipio'];
$n_parroquia = $_POST['n_parroquia'];
$query = "INSERT INTO parroquia (id_parroquia, n_municipio, n_parroquia) VALUES ('$id_parroquia', '$municipio', '$n_parroquia')";
$result = $connection->query($query);
if ($result) {
       header("location: registro_parroquias.php");
} else {
    echo "Error inserting data: " . $connection->error;
}

$connection->close();
?>
