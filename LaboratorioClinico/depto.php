<?php
       session_start();

       ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Departamento</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="pagina.css" >

  <style>
   
  </style>
</head>
<body>
<?php
    include('conexion.php');
    include('GuardarDepto.php');
    include('actualizarDepto.php');
    include('eliminarDepto.php');
   function obtenerDepartamentos() {
    global $conexion;
    $query = "SELECT * FROM depto";
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
              <a href="medico.php" class="nav-link">
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
        <h2><?php echo isset($_GET['edit']) ? 'Actualizar departamento' : 'Agregar departamento'; ?></h2>
        <form method="POST">
          <?php if (isset($_GET['edit'])): ?>
            <?php
              $id = $_GET['edit'];
              $query = "SELECT * FROM depto WHERE idDepto = $id";
              $result = mysqli_query($conexion, $query);
              $departamento = mysqli_fetch_assoc($result);
            ?>
            <input type="hidden" name="idDepto" value="<?php echo $departamento['idDepto']; ?>">
          <?php endif; ?>
          <div class="mb-3">
            <label for="nombreDepto">Nombre</label>
            <input type="text" class="form-control" id="nombreDepto" name="nombreDepto" value="<?php echo isset($departamento) ? $departamento['nombreDepto'] : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="numHabitacion">Numero de habitación</label>
            <input type="text" class="form-control" id="numHabitacion" name="numHabitacion" value="<?php echo isset($departamento) ? $departamento['numHabitacion'] : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="area">Área</label>
            <input type="text" class="form-control" id="area" name="area" value="<?php echo isset($departamento) ? $departamento['area'] : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="seccion">Seccion</label>
            <input type="text" class="form-control" id="seccion" name="seccion" value="<?php echo isset($departamento) ? $departamento['seccion'] : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="responsable">Responsable</label>
            <input type="text" class="form-control" id="responsable" name="responsable" value="<?php echo isset($departamento) ? $departamento['responsable'] : ''; ?>">
          </div>
          <button type="submit" class="btn btn-success" name="submit" value="<?php echo isset($_GET['edit']) ? 'Actualizar' : 'Agregar'; ?>">
            <?php echo isset($_GET['edit']) ? 'Actualizar' : 'Agregar'; ?>
          </button>
          <a href="depto.php" class="btn btn-secondary float-right">Nuevo</a>
        </form>
      </div>
      <table class="table table-striped">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Numero de habitación</th>
              <th>Área</th>
              <th>Seccion</th>
              <th>Responsable</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $equipoLaboratorio = obtenerDepartamentos();
              while ($row = mysqli_fetch_assoc($equipoLaboratorio)):
            ?>
            <tr>
              <td><?php echo $row['nombreDepto']; ?></td>
              <td><?php echo $row['numHabitacion']; ?></td>
              <td><?php echo $row['area']; ?></td>
              <td><?php echo $row['seccion']; ?></td>
              <td><?php echo $row['responsable']; ?></td>
              <td>
                <a href="depto.php?edit=<?php echo $row['idDepto']; ?>" class="bi bi-pencil-square text-dark"style="font-size: 1.2rem;"></a>
                <a href="depto.php?delete=<?php echo $row['idDepto']; ?>" class="bi bi-trash3 text-danger" style="font-size: 1.2rem;" onclick="return confirm('¿Estás seguro de eliminar este departamento?')"></a>
              </td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
        <h3>EXPORTAR EN: </h3>
            <li class="nav-tabs">
              
              <a href="exportarpdfDepto.php" target="_blank" class="bi bi-filetype-pdf" style="font-size: 3rem;"></a>
              <a href="exportarjsonDepto.php" target="_blank" class="bi bi-filetype-json" style="font-size: 3rem;"></a>
              <a href="exportarcsvDepto.php" target="_blank" class="bi bi-filetype-csv" style="font-size: 3rem;"></a>
              <a href="exportarxmlDepto.php" target="_blank" class="bi bi-filetype-xml"style="font-size: 3rem;"></a>
              <a href="exportarxlsDepto.php" target="_blank" class="bi bi-filetype-xls"style="font-size: 3rem;"></a>
            </li>

          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>