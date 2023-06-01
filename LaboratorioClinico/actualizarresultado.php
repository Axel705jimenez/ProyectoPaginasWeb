<?php

function actualizar($idResultado, $valorNumerico, $observaciones, $estado) {
      global $conexion;
      $nuevovalornumerico = mysqli_real_escape_string($conexion, $valorNumerico);
      $observaciones = mysqli_real_escape_string($conexion, $observaciones);
      $estado = mysqli_real_escape_string($conexion, $estado);

      $queryUpdate = "UPDATE resultado SET valornumerico = '$nuevovalornumerico', observaciones = '$observaciones', estado = '$estado' WHERE idResultado = '$idResultado'";

      if (mysqli_query($conexion, $queryUpdate)) {
      } else {
          echo "Error al actualizar el resultado: " . mysqli_error($conexion);
      }
    }
    if (isset($_POST['submit'])) {
        $valorNumerico = $_POST['valorNumerico'];
        $observaciones = $_POST['observaciones'];
        $estado = $_POST['estado'];

  
        if ($_POST['submit'] == 'Agregar') {
          insertar($valorNumerico, $observaciones, $estado);
        } elseif ($_POST['submit'] == 'Actualizar') {
          $id = $_POST['idResultado'];
          actualizar($id, $valorNumerico, $observaciones, $estado);
        }
      }
?>