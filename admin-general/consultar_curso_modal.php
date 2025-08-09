<div class="modal fade" id="cursoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">CURSOS</h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre Curso</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once("../admin-general/conexion_adm.php");
                    $result = mysqli_query($connection, "SELECT * FROM curso");
                    while ($fila = mysqli_fetch_assoc($result)):
                    ?>
                        <tr>
                            <td><?php echo $fila['id_curso']; ?></td>
                            <td><?php echo $fila['nombre_curso']; ?></td>
                        </tr>
                        
                    <?php endwhile; ?>
                </tbody>
            </table>
                
        </div>
    </div>
</div>
