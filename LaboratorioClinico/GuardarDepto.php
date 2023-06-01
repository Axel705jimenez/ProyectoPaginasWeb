<?php
require_once 'conexion.php';

function insertarDepartamento($nombre, $numHabitacion, $area, $seccion, $responsable)
{
    global $conexion;
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $query = "INSERT INTO depto (nombreDepto, numHabitacion, area, seccion, responsable) VALUES ('$nombre', '$numHabitacion', '$area', '$seccion', '$responsable')";
    mysqli_query($conexion, $query);
}
?>
