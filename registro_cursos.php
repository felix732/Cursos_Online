<?php
include './conexion.php';
    $nombre = $_POST['nombre'];
    $folio = $_POST['folio'];
    $categoria = $_POST['categoria'];

   // Handle the file upload
   $archivo_cursos = $_FILES["cursos"]["name"];
   $tempname_cursos = $_FILES["cursos"]["tmp_name"];
   $carpeta_cursos = "./cursos/" . $archivo_cursos;

   // Move the uploaded file to its new location
   move_uploaded_file($tempname_cursos, $carpeta_cursos);
            
    $sql_query = "INSERT INTO cursos (nombre, folio, categoria, foto)
                  VALUES ('$nombre', '$folio', '$categoria', '$carpeta_cursos')";
       
       $query=$connection->query($sql_query);

       if ($query) {    
        ?>
           <h3 class="enviado">Enviado</h3>
        <?php
       }
?>