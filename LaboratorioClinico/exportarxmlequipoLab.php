<?php
require ("conexion.php");
$consulta="Select * from equipoLab WHERE estatus = 1";
$resultado = $conexion->query($consulta);

$xml = new XMLWriter();
$xml->openURI('equipoLab.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

$xml->startElement('tabla');

while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('equipoLab');
    $xml->writeElement('nombreEquipo', $row['nombreEquipo']);
    $xml->writeElement('fabricante', $row['fabricante']);
    $xml->writeElement('modelo', $row['modelo']);
    $xml->writeElement('categoria', $row['categoria']);
    $xml->endElement(); 
}
$xml->endElement();
$xml->endDocument();
$xml->flush();

$conexion->close();

header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename="equipoLab.xml"');
header('Content-Length: ' . filesize('equipoLab.xml'));

readfile('equipoLab.xml');
exit();
?>