
<?php
    function eliminarDepartamento($idDepto) {
      global $conexion;
      $id = mysqli_real_escape_string($conexion, $idDepto);
      $query = "DELETE FROM equipoLab WHERE idequipoLab = $idDepto";
      mysqli_query($conexion, $query);
    }

    if (isset($_GET['delete'])) {
      $id = $_GET['delete'];
      eliminarDepartamento($id);
    }
    ?>