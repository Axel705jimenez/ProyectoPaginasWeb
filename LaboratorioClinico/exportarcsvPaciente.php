<?php
require ("conexion.php");
require('vendor/autoload.php');

$consulta="Select * from paciente WHERE estatus = 1";
$datos = $conexion->query($consulta);
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="paciente.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, array('nombre', 'aPaterno', 'aMaterno','sexo', 'calle', 'colonia', 'numeroExt','ciudad', 'estado', 'correoElectronico'));

while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['nombre'],
        $rows['aPaterno'],
        $rows['aMaterno'],
        $rows['sexo'],
        $rows['calle'],
        $rows['colonia'],
        $rows['numeroExt'],
        $rows['ciudad'],
        $rows['estado'],
        $rows['correoElectronico'],

    ));
}
fclose($output);
exit;
    ?>