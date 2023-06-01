<?php
require ("conexion.php");
$consulta="Select * from prueba WHERE estatus = 1";
$resultado = $conexion->query($consulta);

$xml = new XMLWriter();
$xml->openURI('prueba.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

$xml->startElement('tabla');

while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('prueba');
    $xml->writeElement('nombrePrueba', $row['nombrePrueba']);
    $xml->writeElement('descripcion', $row['descripcion']);
    $xml->writeElement('resultado', $row['resultado']);
    $xml->endElement(); 
}
$xml->endElement();
$xml->endDocument();
$xml->flush();

$conexion->close();

header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename="prueba.xml"');
header('Content-Length: ' . filesize('prueba.xml'));

readfile('prueba.xml');
exit();
?>