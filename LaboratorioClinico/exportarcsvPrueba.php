<?php
require ("conexion.php");
require('vendor/autoload.php');

$consulta="Select * from prueba WHERE estatus = 1";
$datos = $conexion->query($consulta);
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="prueba.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, array('nombrePrueba', 'descripcion', 'resultado'));

while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['nombrePrueba'],
        $rows['descripcion'],
        $rows['resultado'],
    ));
}
fclose($output);
exit;
    ?>