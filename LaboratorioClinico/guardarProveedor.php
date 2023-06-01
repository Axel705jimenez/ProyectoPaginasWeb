<?php
require_once 'conexion.php';

function insertar($nombreEmpresa, $calle, $colonia, $numExt, $ciudad, $estado, $correoElectronico, $personaContacto)
{
    global $conexion;
    $nombreEmpresa = mysqli_real_escape_string($conexion, $nombreEmpresa);
    $query = "INSERT INTO proveedor (nombreEmpresa, calle, colonia, numExt, ciudad, estado, correoElectronico, personaContacto) VALUES ('$nombreEmpresa', '$calle', '$colonia', '$numExt', '$colonia', '$estado',' $correoElectronico',' $personaContacto')";
    mysqli_query($conexion, $query);
}
?>
