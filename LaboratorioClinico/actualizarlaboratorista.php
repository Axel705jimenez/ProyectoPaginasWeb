<?php

function actualizar($idLaboratorista, $nombre, $aPaterno, $aMaterno, $sexo, $numTelefono, $correoElectronico, $especialidad, $numLicencia, $expLaboral) {
      global $conexion;
      $nuevoNombre = mysqli_real_escape_string($conexion, $nombre);
      $aPaterno = mysqli_real_escape_string($conexion, $aPaterno);
      $aMaterno = mysqli_real_escape_string($conexion, $aMaterno);
      $sexo = mysqli_real_escape_string($conexion, $sexo);
      $numTelefono = mysqli_real_escape_string($conexion, $numTelefono);
      $correoElectronico = mysqli_real_escape_string($conexion, $correoElectronico);
      $especialidad = mysqli_real_escape_string($conexion, $especialidad);
      $numLicencia = mysqli_real_escape_string($conexion, $numLicencia);
      $expLaboral = mysqli_real_escape_string($conexion, $expLaboral);

      $queryUpdate = "UPDATE laboratorista SET nombre = '$nuevoNombre', aPaterno = '$aPaterno', aMaterno = '$aMaterno', sexo = '$sexo', numTelefono = '$numTelefono', correoElectronico = '$correoElectronico', especialidad = '$especialidad',
      numLicencia = '$numLicencia', expLaboral = '$expLaboral' WHERE idLaboratorista = '$idLaboratorista'";

      if (mysqli_query($conexion, $queryUpdate)) {
      } else {
          echo "Error al actualizar laboratorista: " . mysqli_error($conexion);
      }
    }
    if (isset($_POST['submit'])) {
        $nombre = $_POST['nombre'];
        $aPaterno = $_POST['aPaterno'];
        $aMaterno = $_POST['aMaterno'];
        $sexo = $_POST['sexo'];
        $numTelefono = $_POST['numTelefono'];
        $correoElectronico = $_POST['correoElectronico'];
        $especialidad = $_POST['especialidad'];
        $numLicencia = $_POST['numLicencia'];
        $expLaboral = $_POST['expLaboral'];
  
        if ($_POST['submit'] == 'Agregar') {
          insertar($nombre, $aPaterno, $aMaterno, $sexo, $numTelefono, $correoElectronico, $especialidad, $numLicencia, $expLaboral);
        } elseif ($_POST['submit'] == 'Actualizar') {
          $id = $_POST['idLaboratorista'];
          actualizar($id, $nombre, $aPaterno, $aMaterno, $sexo, $numTelefono, $correoElectronico, $especialidad, $numLicencia, $expLaboral);
        }
      }
?>