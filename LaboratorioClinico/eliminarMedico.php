
<?php
    function eliminar($idMedico) {
      global $conexion;
      $id = mysqli_real_escape_string($conexion, $idMedico);
      $query = "DELETE FROM medico WHERE idMedico = $idMedico";
      mysqli_query($conexion, $query);
    }

    if (isset($_GET['delete'])) {
      $id = $_GET['delete'];
      eliminar($id);
    }
    ?>