<?php
require ("conexion.php");
$consulta="Select * from depto WHERE estatus = 1";
$resultado = $conexion->query($consulta);

$xml = new XMLWriter();
$xml->openURI('Depto.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

$xml->startElement('tabla');

while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('departamento');
    $xml->writeElement('nombreDepto', $row['nombreDepto']);
    $xml->writeElement('numHabitacion', $row['numHabitacion']);
    $xml->writeElement('area', $row['area']);
    $xml->writeElement('seccion', $row['seccion']);
    $xml->writeElement('responsable', $row['responsable']);
    $xml->endElement(); 
}
$xml->endElement();
$xml->endDocument();
$xml->flush();

$conexion->close();

header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename="depto.xml"');
header('Content-Length: ' . filesize('Depto.xml'));

readfile('depto.xml');
exit();
?>