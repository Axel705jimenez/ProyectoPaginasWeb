<?php
require_once 'conexion.php';

function insertar($nombre, $aPaterno, $aMaterno, $sexo, $numTelefono, $correoElectronico, $especialidad, $numLicencia, $expLaboral)
{
    global $conexion;
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $query = "INSERT INTO laboratorista (nombre, aPaterno, aMaterno, sexo, numTelefono, correoElectronico, especialidad, numLicencia, expLaboral) VALUES ('$nombre', '$aPaterno', '$aMaterno', '$sexo', '$numTelefono', '$correoElectronico','$especialidad', '$numLicencia', '$expLaboral')";
    mysqli_query($conexion, $query);
}
?>
