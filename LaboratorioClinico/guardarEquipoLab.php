<?php
require_once 'conexion.php';

function insertar($nombre, $fabricante, $modelo, $categoria)
{
    global $conexion;
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $query = "INSERT INTO equipoLab (nombreEquipo, fabricante, modelo, categoria) VALUES ('$nombre', '$fabricante', '$modelo', '$categoria')";
    mysqli_query($conexion, $query);
}
?>
