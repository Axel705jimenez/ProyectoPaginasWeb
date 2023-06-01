
<?php
    function eliminar($idMuestra) {
      global $conexion;
      $id = mysqli_real_escape_string($conexion, $idMuestra);
      $query = "DELETE FROM muestra WHERE idMuestra = $idMuestra";
      mysqli_query($conexion, $query);
    }

    if (isset($_GET['delete'])) {
      $id = $_GET['delete'];
      eliminar($id);
    }
    ?>