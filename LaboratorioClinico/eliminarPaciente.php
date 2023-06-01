
<?php
    function eliminar($idPaciente) {
      global $conexion;
      $id = mysqli_real_escape_string($conexion, $idPaciente);
      $query = "DELETE FROM paciente WHERE idPaciente = $idPaciente";
      mysqli_query($conexion, $query);
    }

    if (isset($_GET['delete'])) {
      $id = $_GET['delete'];
      eliminar($id);
    }
    ?>