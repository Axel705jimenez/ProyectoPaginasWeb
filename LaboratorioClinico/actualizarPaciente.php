<?php

function actualizar($idPaciente, $nombre, $aPaterno, $aMaterno, $sexo, $calle, $colonia, $numeroExt, $ciudad, $estado, $correoElectronico) {
      global $conexion;
      $nuevoNombre = mysqli_real_escape_string($conexion, $nombre);
      $aPaterno = mysqli_real_escape_string($conexion, $aPaterno);
      $aMaterno = mysqli_real_escape_string($conexion, $aMaterno);
      $sexo = mysqli_real_escape_string($conexion, $sexo);
      $calle = mysqli_real_escape_string($conexion, $calle);
      $colonia = mysqli_real_escape_string($conexion, $colonia);
      $numeroExt = mysqli_real_escape_string($conexion, $numeroExt);
      $ciudad = mysqli_real_escape_string($conexion, $ciudad);
      $estado = mysqli_real_escape_string($conexion, $estado);
      $correoElectronico = mysqli_real_escape_string($conexion, $correoElectronico);


      $queryUpdate = "UPDATE paciente SET nombre = '$nuevoNombre', aPaterno = '$aPaterno', aMaterno = '$aMaterno', sexo = '$sexo', calle = '$calle', colonia = '$colonia', numeroExt = '$numeroExt',
      ciudad = '$ciudad', estado = '$estado', correoElectronico = '$correoElectronico' WHERE idPaciente = '$idPaciente'";

      if (mysqli_query($conexion, $queryUpdate)) {
      } else {
          echo "Error al actualizar el paciente: " . mysqli_error($conexion);
      }
    }
    if (isset($_POST['submit'])) {
        $nombre = $_POST['nombre'];
        $aPaterno = $_POST['aPaterno'];
        $aMaterno = $_POST['aMaterno'];
        $sexo = $_POST['sexo'];
        $calle = $_POST['calle'];
        $colonia = $_POST['colonia'];
        $numeroExt = $_POST['numeroExt'];
        $ciudad = $_POST['ciudad'];
        $estado = $_POST['estado'];
        $correoElectronico = $_POST['correoElectronico'];

  
        if ($_POST['submit'] == 'Agregar') {
          insertar($nombre, $aPaterno, $aMaterno, $sexo, $calle, $colonia, $numeroExt, $ciudad, $estado, $correoElectronico);
        } elseif ($_POST['submit'] == 'Actualizar') {
          $id = $_POST['idPaciente'];
          actualizar($id, $nombre, $aPaterno, $aMaterno, $sexo, $calle, $colonia, $numeroExt, $ciudad, $estado, $correoElectronico);
        }
      }
?>