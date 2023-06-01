<?php

function actualizar($idMuestra, $tipo, $estadoMuestra, $metodo) {
      global $conexion;
      $nuevotipo = mysqli_real_escape_string($conexion, $tipo);
      $estadoMuestra = mysqli_real_escape_string($conexion, $estadoMuestra);
      $metodo = mysqli_real_escape_string($conexion, $metodo);



      $queryUpdate = "UPDATE muestra SET tipo = '$nuevotipo', estadoMuestra = '$estadoMuestra', metodo = '$metodo' WHERE idMuestra = '$idMuestra'";

      if (mysqli_query($conexion, $queryUpdate)) {
      } else {
          echo "Error al actualizar laboratorista: " . mysqli_error($conexion);
      }
    }
    if (isset($_POST['submit'])) {
        $tipo = $_POST['tipo'];
        $estadoMuestra = $_POST['estadoMuestra'];
        $metodo = $_POST['metodo'];

  
        if ($_POST['submit'] == 'Agregar') {
          insertarMuestra($tipo, $estadoMuestra, $metodo);
        } elseif ($_POST['submit'] == 'Actualizar') {
          $id = $_POST['idMuestra'];
          actualizar($id, $tipo, $estadoMuestra, $metodo);
        }
      }
?>