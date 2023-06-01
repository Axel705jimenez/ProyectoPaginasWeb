<?php
require ("conexion.php");
$consulta="SELECT * FROM resultado WHERE estatus = 1";
$resultado = $conexion->query($consulta);

$grupos = array();

while ($row = $resultado->fetch_assoc()) {
    $grupo = array(
        'valorNumerico' => $row['valorNumerico'],
        'observaciones' => $row['observaciones'],
        'estado' => $row['estado'],
    );

    $grupos[] = $grupo;
}

$conexion->close();

$json = json_encode($grupos);

header('Content-type: application/json');
header('Content-Disposition: attachment; filename="resultado.json"');
header('Content-Length: ' . strlen($json));

echo $json;
exit();
?>