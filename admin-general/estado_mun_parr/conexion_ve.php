<?php
    $servername = "localhost";
    $database = "siscur";
    $username = "root";
    $password = "";
    // Creamos la conexion
    $connection = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>