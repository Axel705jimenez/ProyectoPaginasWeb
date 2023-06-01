<?php
require ("conexion.php");
$consulta="SELECT * FROM muestra WHERE estatus = 1";
$resultado = $conexion->query($consulta);

$grupos = array();

while ($row = $resultado->fetch_assoc()) {
    $grupo = array(
        'tipo' => $row['tipo'],
        'estadoMuestra' => $row['estadoMuestra'],
        'metodo' => $row['metodo'],
    );

    $grupos[] = $grupo;
}

$conexion->close();

$json = json_encode($grupos);

header('Content-type: application/json');
header('Content-Disposition: attachment; filename="Muestra.json"');
header('Content-Length: ' . strlen($json));

echo $json;
exit();
?>