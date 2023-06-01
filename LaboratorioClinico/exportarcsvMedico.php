<?php
require ("conexion.php");
require('vendor/autoload.php');

$consulta="Select * from medico WHERE estatus = 1";
$datos = $conexion->query($consulta);
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="medico.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, array('nombre', 'aPaterno', 'aMaterno','especialidad','numLicencia', 'correoElectronico'));

while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['nombre'],
        $rows['aPaterno'],
        $rows['aMaterno'],
        $rows['especialidad'],
        $rows['numLicencia'],
        $rows['correoElectronico'],

    ));
}
fclose($output);
exit;
    ?>