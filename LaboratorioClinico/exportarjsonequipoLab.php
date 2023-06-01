<?php
require ("conexion.php");
$consulta="SELECT * FROM equipoLab WHERE estatus = 1";
$resultado = $conexion->query($consulta);

$grupos = array();

while ($row = $resultado->fetch_assoc()) {
    $grupo = array(
        'nombreEquipo' => $row['nombreEquipo'],
        'fabricante' => $row['fabricante'],
        'modelo' => $row['modelo'],
        'categoria' => $row['categoria'],
    );

    $grupos[] = $grupo;
}

$conexion->close();

$json = json_encode($grupos);

header('Content-type: application/json');
header('Content-Disposition: attachment; filename="equipoLab.json"');
header('Content-Length: ' . strlen($json));

echo $json;
exit();
?>