<?php


if (isset($_FILES['archivo'])) {
    extract($_POST);
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $telefono = $_POST['telefono'];
    $fecha_nac = $_POST['fecha_nac'];
    $edad = $_POST['edad'];
    $curso = $_POST['curso'];
    $seg_curso = $_POST['seg_curso'];
    $sexo = $_POST['sexo'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $estado = $_POST['estado'];
    $id_rol = $_POST['id_rol'];

   
    $carpeta_destino = "files/";

    
    $nombre_archivo = basename($_FILES["archivo"]["name"]);
    $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));

    
    if ($extension == "pdf" || $extension == "doc" || $extension == "docx") {
      

        
        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $carpeta_destino . $nombre_archivo)) {
            
            include "./conexion_adm.php";
            $sql = "INSERT INTO facilitador (cedula, nombre, apellido, telefono, usuario, clave, cursos, segundo_cursos, sexo, fecha_nac, edad, direccion, correo, estado, id_rol, archivo) 
            VALUES ( '$cedula' ,'$nombre', '$apellido', '$telefono', '$usuario', '$clave', '$curso', '$seg_curso', '$sexo', '$fecha_nac', '$edad', '$direccion', '$correo', '$estado', '$id_rol','$nombre_archivo')";
            $resultado = mysqli_query($connection, $sql);
            if ($resultado) {
                echo "<script language='JavaScript'>
                alert('Archivo Subido');
                location.assign('facilitador.php');
                </script>";
            } else {

                echo "<script language='JavaScript'>
                alert('Error al subir el archivo: ');
                location.assign('facilitador.php');
                </script>";
            }
        } else {
            echo "<script language='JavaScript'>
            alert('Error al subir el archivo. ');
            location.assign('facilitador.php');
            </script>";
        }
    } else {
        echo "<script language='JavaScript'>
        alert('Solo se permiten archivos PDF, DOC y DOCX.');
        location.assign('facilitador.php');
        </script>";
    }
}
