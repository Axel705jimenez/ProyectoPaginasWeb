<?php
require_once 'conexion.php';

function insertarMuestra($tipo, $estadoMuestra, $metodo)
{
    global $conexion;
    $tipo = mysqli_real_escape_string($conexion, $tipo);
    $query = "INSERT INTO muestra (tipo, estadoMuestra, metodo) VALUES ('$tipo', '$estadoMuestra', '$metodo')";
    mysqli_query($conexion, $query);
}
?>
