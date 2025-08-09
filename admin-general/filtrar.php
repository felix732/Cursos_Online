<?php
include './conexion_adm.php';

$estado = $_POST['estado'];
$municipio = $_POST['municipio'];
$curso = $_POST['curso'];


$sql = "SELECT * FROM persona WHERE estado = '$estado' AND municipio = '$municipio'  AND curso = '$curso'";

$resultado = $connection->query($sql);

$output = '';
while ($row = $resultado->fetch_object()) {
    $output .= "<tr>";
    $output .= "<th scope='row'>$counter</th>";
    $output .= "<td>{$row->cedula}</td>";
    $output .= "<td>{$row->nombre}</td>";
    $output .= "<td>{$row->apellido}</td>";
    $output .= "<td>{$row->edad}</td>";
    $output .= "<td>{$row->telefono}</td>";
    $output .= "<td>{$row->correo}</td>";
    $output .= "<td>{$row->direccion}</td>";
    $output .= "<td>{$row->curso}</td>";
    $output .= "<td>{$row->id_rol}</td>";
    $output .= "<td>{$row->municipio}</td>";
    $output .= "<td>{$row->estado}</td>";
    $output .= "</tr>";
    $counter++;
}

echo $output;
?>
