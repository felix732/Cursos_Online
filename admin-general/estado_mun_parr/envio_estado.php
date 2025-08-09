<?php
    extract($_POST);
    $nombre = $_POST['nombre'];
            include "conexion_ve.php";
            $sql = "INSERT INTO estado ( n_estado) 
            VALUES ( '$nombre')";
            $resultado = mysqli_query($connection, $sql);  

            if ($resultado) {
                header ("location: registro_estado.php");
         } else {
             echo "Error de insertar datos: " . $connection->error;
         }
?>