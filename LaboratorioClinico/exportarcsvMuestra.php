<?php
require ("conexion.php");
require('vendor/autoload.php');

$consulta="Select * from muestra WHERE estatus = 1";
$datos = $conexion->query($consulta);
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="muestra.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, array('tipo', 'estadoMuestra', 'metodo'));

while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['tipo'],
        $rows['estadoMuestra'],
        $rows['metodo'],
    ));
}
fclose($output);
exit;
    ?>