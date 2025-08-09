<?php
session_start();

if (isset($_FILES['archivo'])) {
    $id_usuario = isset($_POST['id_usuario']) ? $_POST['id_usuario'] : '';
    $id_curso = isset($_POST['id_curso']) ? $_POST['id_curso'] : ''; 
    $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
    
    // Validar si el usuario ya envió una solicitud
    include "./conexion_faci.php";
    $consulta_existencia = "SELECT * FROM informacion_academica WHERE id_persona = '$id_usuario'";
    $resultado_existencia = mysqli_query($connection, $consulta_existencia);

    if (mysqli_num_rows($resultado_existencia) > 0) {
        // El usuario ya envió una solicitud
        echo "<script language='JavaScript'>
        alert('Ya ha enviado una solicitud de currículum. No puede enviar otra.');
        location.assign('./a01_vista_faci.php');
        </script>";
    } else {
        $fecha_actual = date("Y-m-d");
        $carpeta_destino = "../files_principal/";
        $nombre_archivo = basename($_FILES["archivo"]["name"]);
        $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));

        if ($extension == "pdf") {
            if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $carpeta_destino . $nombre_archivo)) {
                $sql = "INSERT INTO informacion_academica (id_curso, id_persona, archivo, fecha_envio, estado) 
                VALUES ('$id_curso' ,'$id_usuario', '$nombre_archivo', '$fecha_actual', '$estado')";
                $resultado = mysqli_query($connection, $sql);

                if ($resultado) {
                    echo "<script language='JavaScript'>
                    alert('Archivo Subido');
                    location.assign('./a01_vista_faci.php');
                    </script>";
                } else {
                    echo "<script language='JavaScript'>
                    alert('Error al subir el archivo: " . mysqli_error($connection) . "');
                    location.assign('./a01_vista_faci.php');
                    </script>";
                }
            } else {
                echo "<script language='JavaScript'>
                alert('Error al subir el archivo. ');
                location.assign('./a01_vista_faci.php');
                </script>";
            }
        } else {
            echo "<script language='JavaScript'>
            alert('Solo se permiten archivos PDF.');
            location.assign('./a01_vista_faci.php');
            </script>";
        }
    }
}
?>
