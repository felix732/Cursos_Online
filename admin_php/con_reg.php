<?php
    $servername = "localhost";
    $database = "siscur_bd";
    $username = "root";
    $password = "";
    // se crea la conexion :P
    $connection = mysqli_connect($servername, $username, $password, $database);
    // Cla chequeamos en caso que de un error :)
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    } 
?>