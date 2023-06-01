<?php
require ("conexion.php");
$consulta="Select * from resultado WHERE estatus = 1";
$resultado = $conexion->query($consulta);

$xml = new XMLWriter();
$xml->openURI('resultado.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

$xml->startElement('tabla');

while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('resultado');
    $xml->writeElement('valorNumerico', $row['valorNumerico']);
    $xml->writeElement('observaciones', $row['observaciones']);
    $xml->writeElement('estado', $row['estado']);
    $xml->endElement(); 
}
$xml->endElement();
$xml->endDocument();
$xml->flush();

$conexion->close();

header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename="resultado.xml"');
header('Content-Length: ' . filesize('resultado.xml'));

readfile('resultado.xml');
exit();
?>