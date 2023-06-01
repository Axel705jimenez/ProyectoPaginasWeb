<?php
require_once 'conexion.php';

function insertar($nombre, $aPaterno, $aMaterno, $sexo, $calle, $colonia, $numeroExt, $ciudad, $estado, $correoElectronico)
{
    global $conexion;
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $query = "INSERT INTO paciente (nombre, aPaterno, aMaterno, sexo, calle, colonia, numeroExt, ciudad, estado, correoElectronico) VALUES ('$nombre', '$aPaterno', '$aMaterno', '$sexo', '$calle', '$colonia','$numeroExt', '$ciudad', '$estado',' $correoElectronico')";
    mysqli_query($conexion, $query);
}
?>
