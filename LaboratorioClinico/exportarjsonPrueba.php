<?php
require ("conexion.php");
$consulta="SELECT * FROM prueba WHERE estatus = 1";
$resultado = $conexion->query($consulta);

$grupos = array();

while ($row = $resultado->fetch_assoc()) {
    $grupo = array(
        'nombrePrueba' => $row['nombrePrueba'],
        'descripcion' => $row['descripcion'],
        'resultado' => $row['resultado'],
    );

    $grupos[] = $grupo;
}

$conexion->close();

$json = json_encode($grupos);

header('Content-type: application/json');
header('Content-Disposition: attachment; filename="prueba.json"');
header('Content-Length: ' . strlen($json));

echo $json;
exit();
?>