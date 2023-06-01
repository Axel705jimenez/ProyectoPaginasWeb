<?php
require ("conexion.php");
$consulta="SELECT * FROM depto WHERE estatus = 1";
$resultado = $conexion->query($consulta);

$grupos = array();

while ($row = $resultado->fetch_assoc()) {
    $grupo = array(
        'nombreDepto' => $row['nombreDepto'],
        'numHabitacion' => $row['numHabitacion'],
        'area' => $row['area'],
        'seccion' => $row['seccion'],
        'responsable' => $row['responsable'],

    );

    $grupos[] = $grupo;
}

$conexion->close();

$json = json_encode($grupos);

header('Content-type: application/json');
header('Content-Disposition: attachment; filename="Depto.json"');
header('Content-Length: ' . strlen($json));

echo $json;
exit();
?>