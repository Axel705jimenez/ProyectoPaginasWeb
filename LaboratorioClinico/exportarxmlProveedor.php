<?php
require ("conexion.php");
$consulta="Select * from proveedor WHERE estatus = 1";
$resultado = $conexion->query($consulta);

$xml = new XMLWriter();
$xml->openURI('proveedor.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

$xml->startElement('tabla');

while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('proveedor');
    $xml->writeElement('nombreEmpresa', $row['nombreEmpresa']);
    $xml->writeElement('calle', $row['calle']);
    $xml->writeElement('colonia', $row['colonia']);
    $xml->writeElement('numExt', $row['numExt']);
    $xml->writeElement('ciudad', $row['ciudad']);
    $xml->writeElement('estado', $row['estado']);
    $xml->writeElement('correoElectronico', $row['correoElectronico']);
    $xml->writeElement('personaContacto', $row['personaContacto']);
    $xml->endElement(); 
}
$xml->endElement();
$xml->endDocument();
$xml->flush();

$conexion->close();

header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename="proveedor.xml"');
header('Content-Length: ' . filesize('proveedor.xml'));

readfile('proveedor.xml');
exit();
?>