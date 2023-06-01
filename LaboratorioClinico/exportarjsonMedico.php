<?php
require ("conexion.php");
$consulta="SELECT * FROM medico WHERE estatus = 1";
$resultado = $conexion->query($consulta);

$grupos = array();

while ($row = $resultado->fetch_assoc()) {
    $grupo = array(
        'nombre' => $row['nombre'],
        'aPaterno' => $row['aPaterno'],
        'aMaterno' => $row['aMaterno'],
        'especialidad' => $row['especialidad'],
        'numTelefono' => $row['numTelefono'],
        'correoElectronico' => $row['correoElectronico'],
    );

    $grupos[] = $grupo;
}

$conexion->close();

$json = json_encode($grupos);

header('Content-type: application/json');
header('Content-Disposition: attachment; filename="medico.json"');
header('Content-Length: ' . strlen($json));

echo $json;
exit();
?>