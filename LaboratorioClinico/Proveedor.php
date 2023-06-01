<?php
       session_start();

       ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Equipo de laboratorio</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="pagina.css" >
</head>
<body>
<?php
    include('conexion.php');
    include('guardarProveedor.php');
    include('actualizarProveedor.php');
    include('eliminarProveedor.php');
   function obtenerEquipo() {
    global $conexion;
    $query = "SELECT * FROM Proveedor";
    $result = mysqli_query($conexion, $query);
    return $result;
  }
  
  ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
      <div class="sidebar">
          <h4 class="logo">
          <img src="imagenes/logo.png" alt="Logo de la clínica">
            </i> 
            BioTech Diagnostics
          </h4>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a href="depto.php" class="nav-link">
              <i class="bi bi-building"></i>
                <span class="text-black fw-bold">Departamentos</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="equipoLab.php" class="nav-link">
              <i class="bi bi-thermometer-high"></i>
                <span class="text-black fw-bold">Equipos de laboratorio</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="laboratorista.php" class="nav-link">
              <i class="bi bi-eyeglasses"></i>
                <span class="text-black fw-bold">Laboratorista</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="Medico.php" class="nav-link">
              <i class="bi bi-file-earmark-person"></i>
                <span class="text-black fw-bold">Medicos</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="muestra.php" class="nav-link">
              <i class="bi bi-file-earmark-binary"></i>                
              <span class="text-black fw-bold">Muestras</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="paciente.php" class="nav-link">
              <i class="bi bi-person-vcard"></i>                
              <span class="text-black fw-bold">Pacientes</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="proveedor.php" class="nav-link">
              <i class="bi bi-briefcase-fill"></i>                
              <span class="text-black fw-bold">Proveedores</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="prueba.php" class="nav-link">
              <i class="bi bi-capsule"></i>                
              <span class="text-black fw-bold">Pruebas</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="resultado.php" class="nav-link">
              <i class="bi bi-layout-text-sidebar-reverse"></i>                
              <span class="text-black fw-bold">Resultados</span>
              </a>
            </li>
           
          </ul>

        </div>
      </div>
      
      <div class="col-md-9">
        <div class="content">
        <h2><?php echo isset($_GET['edit']) ? 'Actualizar Proveedor' : 'Agregar Proveedor'; ?></h2>
        <form method="POST">
          <?php if (isset($_GET['edit'])): ?>
            <?php
              $id = $_GET['edit'];
              $query = "SELECT * FROM Proveedor WHERE idProveedor = $id";
              $result = mysqli_query($conexion, $query);
              $Proveedor = mysqli_fetch_assoc($result);
            ?>
            <input type="hidden" name="idProveedor" value="<?php echo $Proveedor['idProveedor']; ?>">
          <?php endif; ?>

          <div class="mb-3">
            <label for="nombreEmpresa">Nombre de la empresa</label>
            <input type="text" class="form-control" id="nombreEmpresa" name="nombreEmpresa" value="<?php echo isset($Proveedor) ? $Proveedor['nombreEmpresa'] : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="calle">Calle</label>
            <input type="text" class="form-control" id="calle" name="calle" value="<?php echo isset($Proveedor) ? $Proveedor['calle'] : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="colonia">Colonia</label>
            <input type="text" class="form-control" id="colonia" name="colonia" value="<?php echo isset($Proveedor) ? $Proveedor['colonia'] : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="numExt">Número exterior</label>
            <input type="text" class="form-control" id="numExt" name="numExt" value="<?php echo isset($Proveedor) ? $Proveedor['numExt'] : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="ciudad">Ciudad</label>
            <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?php echo isset($Proveedor) ? $Proveedor['ciudad'] : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="estado">Estado</label>
            <input type="text" class="form-control" id="estado" name="estado" value="<?php echo isset($Proveedor) ? $Proveedor['estado'] : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="correoElectronico">Correo electronico</label>
            <input type="text" class="form-control" id="correoElectronico" name="correoElectronico" value="<?php echo isset($Proveedor) ? $Proveedor['correoElectronico'] : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="personaContacto">Contacto</label>
            <input type="text" class="form-control" id="personaContacto" name="personaContacto" value="<?php echo isset($Proveedor) ? $Proveedor['personaContacto'] : ''; ?>">
          </div>
          <button type="submit" class="btn btn-success" name="submit" value="<?php echo isset($_GET['edit']) ? 'Actualizar' : 'Agregar'; ?>">
            <?php echo isset($_GET['edit']) ? 'Actualizar' : 'Agregar'; ?>
          </button>
          <a href="Proveedor.php" class="btn btn-secondary float-right">Nuevo</a>
        </form>
      </div>
      <table class="table table-striped">
          <thead>
            <tr>
              <th>Nombre de la empresa</th>
              <th>calle</th>
              <th>colonia</th>
              <th>Número exterior</th>
              <th>ciudad</th>
              <th>Estado</th>
              <th>Correo electronico</th>
              <th>Contacto</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $equipodelaboratorio = obtenerEquipo();
              while ($row = mysqli_fetch_assoc($equipodelaboratorio)):
            ?>
            <tr>
              <td><?php echo $row['nombreEmpresa']; ?></td>
              <td><?php echo $row['calle']; ?></td>
              <td><?php echo $row['colonia']; ?></td>
              <td><?php echo $row['numExt']; ?></td>
              <td><?php echo $row['ciudad']; ?></td>
              <td><?php echo $row['estado']; ?></td>
              <td><?php echo $row['correoElectronico']; ?></td>
              <td><?php echo $row['personaContacto']; ?></td>
              <td>
                <a href="Proveedor.php?edit=<?php echo $row['idProveedor']; ?>" class="bi bi-pencil-square text-dark"style="font-size: 1.2rem;"></a>
                <a href="Proveedor.php?delete=<?php echo $row['idProveedor']; ?>" class="bi bi-trash3 text-danger" style="font-size: 1.2rem;" onclick="return confirm('¿Estás seguro de eliminar este departamento?')"></a>
              </td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
        <h3>EXPORTAR EN: </h3>
            <li class="nav-tabs">
              <a href="exportarpdfProveedor.php" target="_blank" class="bi bi-filetype-pdf" style="font-size: 3rem;"></a>
              <a href="exportarjsonProveedor.php" target="_blank" class="bi bi-filetype-json" style="font-size: 3rem;"></a>
              <a href="exportarcsvProveedor.php" target="_blank" class="bi bi-filetype-csv" style="font-size: 3rem;"></a>
              <a href="exportarxmlProveedor.php" target="_blank" class="bi bi-filetype-xml"style="font-size: 3rem;"></a>
              <a href="exportarxlsProveedor.php" target="_blank" class="bi bi-filetype-xls"style="font-size: 3rem;"></a>
            </li>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>