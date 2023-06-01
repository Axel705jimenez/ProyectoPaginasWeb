<?php
require ("conexion.php");
$consulta="Select * from paciente WHERE estatus = 1";
$resultado = $conexion->query($consulta);

$xml = new XMLWriter();
$xml->openURI('paciente.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

$xml->startElement('tabla');

while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('paciente');
    $xml->writeElement('nombre', $row['nombre']);
    $xml->writeElement('aPaterno', $row['aPaterno']);
    $xml->writeElement('aMaterno', $row['aMaterno']);
    $xml->writeElement('sexo', $row['sexo']);
    $xml->writeElement('calle', $row['calle']);
    $xml->writeElement('colonia', $row['colonia']);
    $xml->writeElement('numeroExt', $row['numeroExt']);
    $xml->writeElement('ciudad', $row['ciudad']);
    $xml->writeElement('estado', $row['estado']);
    $xml->writeElement('correoElectronico', $row['correoElectronico']);

    $xml->endElement(); 
}
$xml->endElement();
$xml->endDocument();
$xml->flush();

$conexion->close();

header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename="paciente.xml"');
header('Content-Length: ' . filesize('paciente.xml'));

readfile('paciente.xml');
exit();
?>