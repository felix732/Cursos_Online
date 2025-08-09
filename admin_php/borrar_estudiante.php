<?php
  session_start();
  include './con_reg.php';

  		$id = $_POST['id'];

  		$query="DELETE FROM persona where id = '$id'";
        $eliminar=$connection->query($query);

        header("Location: ../admin-general/adm-estudiante.php");  
?>