
<?php
    function eliminar($idLaboratorista) {
      global $conexion;
      $id = mysqli_real_escape_string($conexion, $idLaboratorista);
      $query = "DELETE FROM laboratorista WHERE idLaboratorista = $idLaboratorista";
      mysqli_query($conexion, $query);
    }

    if (isset($_GET['delete'])) {
      $id = $_GET['delete'];
      eliminar($id);
    }
    ?>