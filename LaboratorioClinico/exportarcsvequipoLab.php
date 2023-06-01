<?php
require ("conexion.php");
require('vendor/autoload.php');

$consulta="Select * from equipoLab WHERE estatus = 1";
$datos = $conexion->query($consulta);
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="equipoLab.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, array('nombreEquipo', 'fabricante', 'modelo','categoria'));

while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['nombreEquipo'],
        $rows['fabricante'],
        $rows['modelo'],
        $rows['categoria'],
    ));
}
fclose($output);
exit;
    ?>