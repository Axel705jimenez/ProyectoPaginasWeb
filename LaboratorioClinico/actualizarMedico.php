<?php

function actualizar($idMedico, $nombre, $aPaterno, $aMaterno, $numTelefono, $correoElectronico, $especialidad) {
      global $conexion;
      $nuevoNombre = mysqli_real_escape_string($conexion, $nombre);
      $aPaterno = mysqli_real_escape_string($conexion, $aPaterno);
      $aMaterno = mysqli_real_escape_string($conexion, $aMaterno);
      $numTelefono = mysqli_real_escape_string($conexion, $numTelefono);
      $correoElectronico = mysqli_real_escape_string($conexion, $correoElectronico);
      $especialidad = mysqli_real_escape_string($conexion, $especialidad);


      $queryUpdate = "UPDATE Medico SET nombre = '$nuevoNombre', aPaterno = '$aPaterno', aMaterno = '$aMaterno', numTelefono = '$numTelefono', correoElectronico = '$correoElectronico', especialidad = '$especialidad' WHERE idMedico = '$idMedico'";

      if (mysqli_query($conexion, $queryUpdate)) {
      } else {
          echo "Error al actualizar laboratorista: " . mysqli_error($conexion);
      }
    }
    if (isset($_POST['submit'])) {
        $nombre = $_POST['nombre'];
        $aPaterno = $_POST['aPaterno'];
        $aMaterno = $_POST['aMaterno'];
        $numTelefono = $_POST['numTelefono'];
        $correoElectronico = $_POST['correoElectronico'];
        $especialidad = $_POST['especialidad'];

  
        if ($_POST['submit'] == 'Agregar') {
          insertar($nombre, $aPaterno, $aMaterno, $numTelefono, $correoElectronico, $especialidad);
        } elseif ($_POST['submit'] == 'Actualizar') {
          $id = $_POST['idMedico'];
          actualizar($id, $nombre, $aPaterno, $aMaterno, $numTelefono, $correoElectronico, $especialidad);
        }
      }
?>