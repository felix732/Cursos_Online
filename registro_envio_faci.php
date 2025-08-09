<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES['archivo'])) {
    extract($_POST);

    // Definir la carpeta de destino
    $carpeta_destino = "files_principal/";

    // Obtener el nombre y la extensión del archivo
    $nombre_archivo = basename($_FILES["archivo"]["name"]);
    $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));

    // Validar la extensión del archivo
    $extensiones_permitidas = array("pdf", "doc", "docx");
    if (!in_array($extension, $extensiones_permitidas)) {
        echo "<script language='JavaScript'>
                alert('Solo se permiten archivos PDF, DOC y DOCX.');
                location.assign('registro-facilitador.php');
                </script>";
        exit();
    }

    // Mover el archivo a la carpeta de destino
    $archivo_destino = $carpeta_destino . $nombre_archivo;
    if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivo_destino)) {
        // Insertar la información del archivo en la base de datos
        include "./conexion.php";
        $fecha_envio = date("Y-m-d H:i:s"); // Obtiene la fecha y hora actuales

        $sql = "INSERT INTO facilitador (cedula, nombre, apellido, telefono, usuario, clave, cursos, segundo_cursos, sexo, fecha_nac, edad, direccion, correo, estado, fecha_envio, id_rol, archivo) 
                VALUES ('$cedula', '$nombre', '$apellido', '$telefono', '$usuario', '$clave', '$curso', '$seg_curso', '$sexo', '$fecha_nac', '$edad', '$direccion', '$correo', '$estado', '$fecha_envio', '$id_rol', '$nombre_archivo')";
        
        $resultado = mysqli_query($connection, $sql);

        if ($resultado) {
            echo "<script language='JavaScript'>
                    alert('Archivo Subido');
                    location.assign('facilitador.php');
                    </script>";
        } else {
            echo "<script language='JavaScript'>
                    alert('Error al subir el archivo: " . mysqli_error($connection) . "');
                    location.assign('registro-facilitador.php');
                    </script>";
        }
    } else {
        echo "<script language='JavaScript'>
                alert('Error al subir el archivo.');
                location.assign('registro-facilitador.php');
                </script>";
    }
} else {
    // Redirigir si se intenta acceder directamente a este script sin enviar el formulario
    header("Location: registro-facilitador.php");
    exit();
}
?>
