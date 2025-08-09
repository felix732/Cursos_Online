<?php


    extract($_POST);
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $categoria = $_POST['cate'];
      
            include "conexion_adm.php";
            $sql = "INSERT INTO curso (id_curso, nombre_curso, categoria_curso, status_curso) 
            VALUES ( '$id','$nombre','$categoria','$status')";
            $resultado = mysqli_query($connection, $sql);
            if ($resultado) {
                echo "<script language='JavaScript'>
                alert('Se Agrego el Curso Correctamente');
                location.assign('adm-curso-1.php');
                </script>";
            } else {

                echo "<script language='JavaScript'>
                alert('Error a Agregar ');
                location.assign('adm-curso-1.php');
                </script>";
            }
?>