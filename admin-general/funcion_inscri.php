<?php 
 extract($_POST);
 require_once("conexion_adm.php");
 $consulta = "DELETE FROM inscritos WHERE id_inscripcion = '$id' ";
 $resultado = mysqli_query($connection , $consulta);
 if ($resultado) {
     echo "
     <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
     <script language='JavaScript'>
     document.addEventListener('DOMContentLoaded', function() {
         Swal.fire({
             icon: 'success',
             title: 'El aspirante fue Eliminado correctamente',
             showCancelButton: false,
             confirmButtonColor: '#3085d6',
             confirmButtonText: 'OK',
             timer: 1500
           }).then(() => {
             location.assign('inscritos.php');
           });
 });
     </script>
 ";
 } else {
     echo "
     <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
     <script language='JavaScript'>
     document.addEventListener('DOMContentLoaded', function() {
         Swal.fire({
             icon: 'success',
             title: 'Error al Eliminar el Aspirante',
             showCancelButton: false,
             confirmButtonColor: '#3085d6',
             confirmButtonText: 'OK',
             timer: 1500
           }).then(() => {
             location.assign('inscritos.php');
           });
 });
     </script>
 ";
 }
?>