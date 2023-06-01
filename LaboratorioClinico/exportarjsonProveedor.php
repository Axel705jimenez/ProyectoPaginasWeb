<?php
require ("conexion.php");
$consulta="SELECT * FROM proveedor WHERE estatus = 1";
$resultado = $conexion->query($consulta);

$grupos = array();

while ($row = $resultado->fetch_assoc()) {
    $grupo = array(
        'nombreEmpresa' => $row['nombreEmpresa'],
        'calle' => $row['calle'],
        'colonia' => $row['colonia'],
        'numExt' => $row['numExt'],
        'ciudad' => $row['ciudad'],
        'estado' => $row['estado'],
        'correoElecctronico' => $row['correoElecctronico'],
        'personaContacto' => $row['personaContacto'],

    );

    $grupos[] = $grupo;
}

$conexion->close();

$json = json_encode($grupos);

header('Content-type: application/json');
header('Content-Disposition: attachment; filename="proveedor.json"');
header('Content-Length: ' . strlen($json));

echo $json;
exit();
?>