
   <?php
    // Función para eliminar un departamento de la base de datos
    function eliminarDepartamento($idDepto) {
      global $conexion;
      $id = mysqli_real_escape_string($conexion, $idDepto);
      $query = "DELETE FROM depto WHERE idDepto = $idDepto";
      mysqli_query($conexion, $query);
    }

    // Procesar la eliminación de un departamento
    if (isset($_GET['delete'])) {
      $id = $_GET['delete'];
      eliminarDepartamento($id);
    }
    ?>