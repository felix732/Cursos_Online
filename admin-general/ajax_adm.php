<?php
include_once 'conexion_adm.php';

if (isset($_POST['estado'])) {
    $id_estado = $_POST['estado'];


    $query = mysqli_query($connection, "SELECT * FROM municipio WHERE estado = '$id_estado'");
    
    $municipios = array();
    while ($row = mysqli_fetch_array($query)) {
        $municipios[] = array(
            'id' => $row['id_municipio'],
            'nombre' => $row['municipio']
        );
    }


    echo json_encode($municipios);
} elseif (isset($_POST['municipio'])) {
    $id_municipio = $_POST['municipio'];

  
    $query = mysqli_query($connection, "SELECT * FROM parroquia WHERE n_municipio = '$id_municipio'");
    
    $parroquias = array();
    while ($row = mysqli_fetch_array($query)) {
        $parroquias[] = array(
            'id' => $row['id_parroquia'],
            'nombre' => $row['n_parroquia']
        );
    }

    // Devolver las parroquias como JSON
    echo json_encode($parroquias);
}
?>
