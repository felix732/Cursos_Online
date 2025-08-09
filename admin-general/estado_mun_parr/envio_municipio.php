<?php
    extract($_POST);
    $estado = $_POST['estado'];
    $nombre = $_POST['nombre'];
            include "conexion_ve.php";
            $sql = "INSERT INTO municipio ( municipio, estado) 
            VALUES ( '$nombre', '$estado')";
            $resultado = mysqli_query($connection, $sql);  

            if ($resultado) {
                header ("location: registro_municipio.php");
         } else {
             echo "Error de insertar datos: " . $connection->error;
         }
?>