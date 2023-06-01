<?php
require ("conexion.php");
require('vendor/autoload.php');

$consulta="Select * from depto WHERE estatus = 1";
$datos = $conexion->query($consulta);
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="depto.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, array('nombreDepto', 'numHabitacion', 'area','seccion','responsable'));

while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['nombreDepto'],
        $rows['numHabitacion'],
        $rows['area'],
        $rows['seccion'],
        $rows['responsable'],
    ));
}
fclose($output);
exit;
    ?>