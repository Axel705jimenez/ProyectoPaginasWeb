<?php
require ("conexion.php");
$consulta="Select * from laboratorista WHERE estatus = 1";
$resultado = $conexion->query($consulta);

$xml = new XMLWriter();
$xml->openURI('laboratorista.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

$xml->startElement('tabla');

while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('laboratorista');
    $xml->writeElement('nombre', $row['nombre']);
    $xml->writeElement('aPaterno', $row['aPaterno']);
    $xml->writeElement('aMaterno', $row['aMaterno']);
    $xml->writeElement('sexo', $row['sexo']);
    $xml->writeElement('numTelefono', $row['numTelefono']);
    $xml->writeElement('correoElectronico', $row['correoElectronico']);
    $xml->writeElement('especialidad', $row['especialidad']);
    $xml->writeElement('numLicencia', $row['numLicencia']);
    $xml->writeElement('expLaboral', $row['expLaboral']);

    $xml->endElement(); 
}
$xml->endElement();
$xml->endDocument();
$xml->flush();

$conexion->close();

header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename="laboratorista.xml"');
header('Content-Length: ' . filesize('laboratorista.xml'));

readfile('laboratorista.xml');
exit();
?>