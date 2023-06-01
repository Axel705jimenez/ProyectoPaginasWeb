<?php
require ("conexion.php");
require('vendor/autoload.php');

$consulta="Select * from laboratorista WHERE estatus = 1";
$datos = $conexion->query($consulta);
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="laboratorista.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, array('nombre', 'aPaterno', 'aMaterno','sexo', 'numTelefono', 'correoElectronico', 'especialidad','numLicencia', 'expLaboral'));

while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['nombre'],
        $rows['aPaterno'],
        $rows['aMaterno'],
        $rows['sexo'],
        $rows['numTelefono'],
        $rows['correoElectronico'],
        $rows['especialidad'],
        $rows['numLicencia'],
        $rows['expLaboral'],

    ));
}
fclose($output);
exit;
    ?>