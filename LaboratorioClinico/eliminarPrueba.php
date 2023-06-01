
<?php
    function eliminar($idProveedor) {
      global $conexion;
      $id = mysqli_real_escape_string($conexion, $idProveedor);
      $query = "DELETE FROM prueba WHERE idPrueba = $idProveedor";
      mysqli_query($conexion, $query);
    }

    if (isset($_GET['delete'])) {
      $id = $_GET['delete'];
      eliminar($id);
    }
    ?>