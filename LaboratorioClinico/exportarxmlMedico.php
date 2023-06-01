<?php
require ("conexion.php");
$consulta="Select * from medico WHERE estatus = 1";
$resultado = $conexion->query($consulta);

$xml = new XMLWriter();
$xml->openURI('medico.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

$xml->startElement('tabla');

while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('medico');
    $xml->writeElement('nombre', $row['nombre']);
    $xml->writeElement('aPaterno', $row['aPaterno']);
    $xml->writeElement('aMaterno', $row['aMaterno']);
    $xml->writeElement('especialidad', $row['especialidad']);
    $xml->writeElement('numLicencia', $row['numLicencia']);
    $xml->writeElement('correoElectronico', $row['correoElectronico']);
    $xml->endElement(); 
}
$xml->endElement();
$xml->endDocument();
$xml->flush();

$conexion->close();

header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename="medico.xml"');
header('Content-Length: ' . filesize('medico.xml'));

readfile('medico.xml');
exit();
?>