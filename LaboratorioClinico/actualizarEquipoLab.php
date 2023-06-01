<?php

function actualizar($idEquipoLab, $nombre, $fabricante, $modelo, $categoria) {
      global $conexion;
      $nuevoNombre = mysqli_real_escape_string($conexion, $nombre);
      $fabricante = mysqli_real_escape_string($conexion, $fabricante);
      $modelo = mysqli_real_escape_string($conexion, $modelo);
      $categoria = mysqli_real_escape_string($conexion, $categoria);

      // Actualizar el departamento
      $queryUpdate = "UPDATE equipoLab SET nombreEquipo = '$nuevoNombre', fabricante = '$fabricante', modelo = '$modelo', categoria = '$categoria' WHERE idEquipoLab = '$idEquipoLab'";

      if (mysqli_query($conexion, $queryUpdate)) {
      } else {
          echo "Error al actualizar el equipo de laboratorio: " . mysqli_error($conexion);
      }
    }
    if (isset($_POST['submit'])) {
        $nombre = $_POST['nombreEquipo'];
        $fabricante = $_POST['fabricante'];
        $modelo = $_POST['modelo'];
        $categoria = $_POST['categoria'];
  
        if ($_POST['submit'] == 'Agregar') {
          insertar($nombre, $fabricante, $modelo, $categoria);
        } elseif ($_POST['submit'] == 'Actualizar') {
          $id = $_POST['idEquipoLab'];
          actualizar($id, $nombre, $fabricante, $modelo, $categoria);
        }
      }
?>