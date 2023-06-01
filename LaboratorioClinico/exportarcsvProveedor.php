<?php
require ("conexion.php");
require('vendor/autoload.php');

$consulta="Select * from proveedor WHERE estatus = 1";
$datos = $conexion->query($consulta);
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="proveedor.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, array('nombreEmpresa', 'calle', 'colonia','numExt','ciudad', 'estado','correoElectronico', 'personaContacto'));

while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['nombreEmpresa'],
        $rows['calle'],
        $rows['colonia'],
        $rows['numExt'],
        $rows['ciudad'],
        $rows['estado'],
        $rows['correoElectronico'],
        $rows['personaContacto'],
    ));
}
fclose($output);
exit;
    ?>