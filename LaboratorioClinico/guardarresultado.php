<?php
require_once 'conexion.php';

function insertar($valorNumerico, $observaciones, $estado)
{
    global $conexion;
    $valorNumerico = mysqli_real_escape_string($conexion, $valorNumerico);
    $query = "INSERT INTO resultado (valorNumerico, observaciones, estado) VALUES ('$valorNumerico', '$observaciones', '$estado')";
    mysqli_query($conexion, $query);
}
?>
