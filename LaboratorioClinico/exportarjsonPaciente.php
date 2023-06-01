<?php
require ("conexion.php");
$consulta="SELECT * FROM paciente WHERE estatus = 1";
$resultado = $conexion->query($consulta);

$grupos = array();

while ($row = $resultado->fetch_assoc()) {
    $grupo = array(
        'nombre' => $row['nombre'],
        'aPaterno' => $row['aPaterno'],
        'aMaterno' => $row['aMaterno'],
        'sexo' => $row['sexo'],
        'calle' => $row['calle'],
        'colonia' => $row['colonia'],
        'numeroExt' => $row['numeroExt'],
        'ciudad' => $row['ciudad'],
        'estado' => $row['estado'],
        'correoElectronico' => $row['correoElectronico'],

    );

    $grupos[] = $grupo;
}

$conexion->close();

$json = json_encode($grupos);

header('Content-type: application/json');
header('Content-Disposition: attachment; filename="paciente.json"');
header('Content-Length: ' . strlen($json));

echo $json;
exit();
?>