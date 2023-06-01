<?php
require ("conexion.php");
require('vendor/autoload.php');

$consulta="Select * from resultado WHERE estatus = 1";
$datos = $conexion->query($consulta);
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="resultado.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, array('valorNumerico', 'observaciones', 'estado'));

while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['valorNumerico'],
        $rows['observaciones'],
        $rows['estado'],
    ));
}
fclose($output);
exit;
    ?>