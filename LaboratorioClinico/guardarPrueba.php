<?php
require_once 'conexion.php';

function insertar($nombrePrueba, $descripcion, $resultado)
{
    global $conexion;
    $nombrePrueba = mysqli_real_escape_string($conexion, $nombrePrueba);
    $query = "INSERT INTO prueba (nombrePrueba, descripcion, resultado) VALUES ('$nombrePrueba', '$descripcion', '$resultado')";
    mysqli_query($conexion, $query);
}
?>
