<?php

function actualizar($idPrueba, $nombrePrueba, $descripcion, $resultado) {
      global $conexion;
      $nuevonombrePrueba = mysqli_real_escape_string($conexion, $nombrePrueba);
      $descripcion = mysqli_real_escape_string($conexion, $descripcion);
      $resultado = mysqli_real_escape_string($conexion, $resultado);

      $queryUpdate = "UPDATE prueba SET nombrePrueba = '$nuevonombrePrueba', descripcion = '$descripcion', resultado = '$resultado' WHERE idPrueba = '$idPrueba'";

      if (mysqli_query($conexion, $queryUpdate)) {
      } else {
          echo "Error al actualizar laboratorista: " . mysqli_error($conexion);
      }
    }
    if (isset($_POST['submit'])) {
        $nombrePrueba = $_POST['nombrePrueba'];
        $descripcion = $_POST['descripcion'];
        $resultado = $_POST['resultado'];

  
        if ($_POST['submit'] == 'Agregar') {
          insertar($nombrePrueba, $descripcion, $resultado);
        } elseif ($_POST['submit'] == 'Actualizar') {
          $id = $_POST['idPrueba'];
          actualizar($id, $nombrePrueba, $descripcion, $resultado);
        }
      }
?>