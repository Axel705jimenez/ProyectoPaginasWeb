<?php

function actualizarDepartamento($idDepto, $nombre, $numHabitacion, $area, $seccion, $responsable) {
      global $conexion;
      $nuevoNombre = mysqli_real_escape_string($conexion, $nombre);
      $numHabitacion = mysqli_real_escape_string($conexion, $numHabitacion);
      $area = mysqli_real_escape_string($conexion, $area);
      $seccion = mysqli_real_escape_string($conexion, $seccion);
      $responsable = mysqli_real_escape_string($conexion, $responsable);

      // Actualizar el departamento
      $queryUpdate = "UPDATE depto SET nombreDepto = '$nuevoNombre', numHabitacion = '$numHabitacion', area = '$area', seccion = '$seccion', responsable = '$responsable' WHERE idDepto = '$idDepto'";

      if (mysqli_query($conexion, $queryUpdate)) {
      } else {
          echo "Error al actualizar el departamento: " . mysqli_error($conexion);
      }
    }
    if (isset($_POST['submit'])) {
        $nombre = $_POST['nombreDepto'];
        $numHabitacion = $_POST['numHabitacion'];
        $area = $_POST['area'];
        $seccion = $_POST['seccion'];
        $responsable = $_POST['responsable'];
  
        if ($_POST['submit'] == 'Agregar') {
          insertarDepartamento($nombre, $numHabitacion, $area, $seccion, $responsable);
        } elseif ($_POST['submit'] == 'Actualizar') {
          $id = $_POST['idDepto'];
          actualizarDepartamento($id, $nombre, $numHabitacion, $area, $seccion, $responsable);
        }
      }
?>