<?php
require_once 'conexion.php';

function insertar($nombre, $aPaterno, $aMaterno, $numTelefono, $correoElectronico, $especialidad)
{
    global $conexion;
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $query = "INSERT INTO medico (nombre, aPaterno, aMaterno, numTelefono, correoElectronico, especialidad) VALUES ('$nombre', '$aPaterno', '$aMaterno', '$numTelefono', '$correoElectronico','$especialidad')";
    mysqli_query($conexion, $query);
}
?>
