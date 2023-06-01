<?php

function actualizar($idProveedor, $nombreEmpresa, $calle, $colonia, $numExt,$ciudad, $estado, $correoElectronico, $personaContacto) {
      global $conexion;
      $nuevonombreEmpresa = mysqli_real_escape_string($conexion, $nombreEmpresa);
      $calle = mysqli_real_escape_string($conexion, $calle);
      $colonia = mysqli_real_escape_string($conexion, $colonia);
      $numExt = mysqli_real_escape_string($conexion, $numExt);
      $ciudad = mysqli_real_escape_string($conexion, $ciudad);
      $estado = mysqli_real_escape_string($conexion, $estado);
      $correoElectronico = mysqli_real_escape_string($conexion, $correoElectronico);
      $personaContacto = mysqli_real_escape_string($conexion, $personaContacto);

      $queryUpdate = "UPDATE proveedor SET nombreEmpresa = '$nuevonombreEmpresa', calle = '$calle', colonia = '$colonia', numExt = '$numExt', ciudad = '$ciudad', estado = '$estado', correoElectronico = '$correoElectronico',
      personaContacto = '$personaContacto' WHERE idProveedor = '$idProveedor'";

      if (mysqli_query($conexion, $queryUpdate)) {
      } else {
          echo "Error al actualizar el proveedor: " . mysqli_error($conexion);
      }
    }
    if (isset($_POST['submit'])) {
        $nombreEmpresa = $_POST['nombreEmpresa'];
        $calle = $_POST['calle'];
        $colonia = $_POST['colonia'];
        $numExt = $_POST['numExt'];
        $ciudad = $_POST['ciudad'];
        $estado = $_POST['estado'];
        $correoElectronico = $_POST['correoElectronico'];
        $personaContacto = $_POST['personaContacto'];


  
        if ($_POST['submit'] == 'Agregar') {
          insertar($nombreEmpresa, $nombreEmpresa, $calle, $colonia, $numExt,$ciudad, $estado, $correoElectronico, $personaContacto);
        } elseif ($_POST['submit'] == 'Actualizar') {
          $id = $_POST['idProveedor'];
          actualizar($id, $nombreEmpresa, $calle, $colonia, $numExt,$ciudad, $estado, $correoElectronico, $personaContacto);
      }
    }
?>