<?php
require ("conexion.php");
$consulta="Select * from muestra WHERE estatus = 1";
$resultado = $conexion->query($consulta);

$xml = new XMLWriter();
$xml->openURI('muestra.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

$xml->startElement('tabla');

while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('muestra');
    $xml->writeElement('tipo', $row['tipo']);
    $xml->writeElement('estadoMuestra', $row['estadoMuestra']);
    $xml->writeElement('metodo', $row['metodo']);
    $xml->endElement(); 
}
$xml->endElement();
$xml->endDocument();
$xml->flush();

$conexion->close();

header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename="muestra.xml"');
header('Content-Length: ' . filesize('muestra.xml'));

readfile('muestra.xml');
exit();
?>