<?php
require ("conexion.php");
$consulta="SELECT * FROM laboratorista WHERE estatus = 1";
$resultado = $conexion->query($consulta);

$grupos = array();

while ($row = $resultado->fetch_assoc()) {
    $grupo = array(
        'nombre' => $row['nombre'],
        'aPaterno' => $row['aPaterno'],
        'aMaterno' => $row['aMaterno'],
        'sexo' => $row['sexo'],
        'numTelefono' => $row['numTelefono'],
        'correoElectronico' => $row['correoElectronico'],
        'especialidad' => $row['especialidad'],
        'numLicencia' => $row['numLicencia'],
        'expLaboral' => $row['expLaboral'],
    );

    $grupos[] = $grupo;
}

$conexion->close();

$json = json_encode($grupos);

header('Content-type: application/json');
header('Content-Disposition: attachment; filename="laboratorista.json"');
header('Content-Length: ' . strlen($json));

echo $json;
exit();
?>