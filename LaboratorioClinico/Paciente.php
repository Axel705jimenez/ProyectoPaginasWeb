<?php
       session_start();

       ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Paciente</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="pagina.css" >
</head>
<body>
<?php
    include('conexion.php');
    include('guardarPaciente.php');
    include('actualizarPaciente.php');
    include('eliminarPaciente.php');
   function obtenerEquipo() {
    global $conexion;
    $query = "SELECT * FROM Paciente";
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
        <h2><?php echo isset($_GET['edit']) ? 'Actualizar Paciente' : 'Agregar Paciente'; ?></h2>
        <form method="POST">
          <?php if (isset($_GET['edit'])): ?>
            <?php
              $id = $_GET['edit'];
              $query = "SELECT * FROM Paciente WHERE idPaciente = $id";
              $result = mysqli_query($conexion, $query);
              $Paciente = mysqli_fetch_assoc($result);
            ?>
            <input type="hidden" name="idPaciente" value="<?php echo $Paciente['idPaciente']; ?>">
          <?php endif; ?>
          <div class="mb-3">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo isset($Paciente) ? $Paciente['nombre'] : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="aPaterno">Primer apellido</label>
            <input type="text" class="form-control" id="aPaterno" name="aPaterno" value="<?php echo isset($Paciente) ? $Paciente['aPaterno'] : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="aMaterno">Segundo apellido</label>
            <input type="text" class="form-control" id="aMaterno" name="aMaterno" value="<?php echo isset($Paciente) ? $Paciente['aMaterno'] : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="sexo">Sexo</label>
            <input type="text" class="form-control" id="sexo" name="sexo" value="<?php echo isset($Paciente) ? $Paciente['sexo'] : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="calle">Calle</label>
            <input type="text" class="form-control" id="calle" name="calle" value="<?php echo isset($Paciente) ? $Paciente['calle'] : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="colonia">Colonia</label>
            <input type="text" class="form-control" id="colonia" name="colonia" value="<?php echo isset($Paciente) ? $Paciente['colonia'] : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="numeroExt">Numero numeroExt</label>
            <input type="text" class="form-control" id="numeroExt" name="numeroExt" value="<?php echo isset($Paciente) ? $Paciente['numeroExt'] : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="ciudad">ciudad</label>
            <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?php echo isset($Paciente) ? $Paciente['ciudad'] : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="estado">Estado</label>
            <input type="text" class="form-control" id="estado" name="estado" value="<?php echo isset($Paciente) ? $Paciente['estado'] : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="correoElectronico">Correo electronico</label>
            <input type="text" class="form-control" id="correoElectronico" name="correoElectronico" value="<?php echo isset($Paciente) ? $Paciente['correoElectronico'] : ''; ?>">
          </div>
          <button type="submit" class="btn btn-success" name="submit" value="<?php echo isset($_GET['edit']) ? 'Actualizar' : 'Agregar'; ?>">
            <?php echo isset($_GET['edit']) ? 'Actualizar' : 'Agregar'; ?>
          </button>
          <a href="Paciente.php" class="btn btn-secondary float-right">Nuevo</a>
        </form>
      </div>
      <table class="table table-striped">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Primer apellido</th>
              <th>Segundo apellido</th>
              <th>Sexo</th>
              <th>Calle</th>
              <th>numeroExt</th>
              <th>Colonia</th>
              <th>Ciudad</th>
              <th>Estado</th>
              <th>correoElectronico</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $equipodelaboratorio = obtenerEquipo();
              while ($row = mysqli_fetch_assoc($equipodelaboratorio)):
            ?>
            <tr>
              <td><?php echo $row['nombre']; ?></td>
              <td><?php echo $row['aPaterno']; ?></td>
              <td><?php echo $row['aMaterno']; ?></td>
              <td><?php echo $row['sexo']; ?></td>
              <td><?php echo $row['calle']; ?></td>
              <td><?php echo $row['numeroExt']; ?></td>
              <td><?php echo $row['colonia']; ?></td>
              <td><?php echo $row['ciudad']; ?></td>
              <td><?php echo $row['estado']; ?></td>
              <td><?php echo $row['correoElectronico']; ?></td>
              <td>
                <a href="Paciente.php?edit=<?php echo $row['idPaciente']; ?>" class="bi bi-pencil-square text-dark"style="font-size: 1.2rem;"></a>
                <a href="Paciente.php?delete=<?php echo $row['idPaciente']; ?>" class="bi bi-trash3 text-danger" style="font-size: 1.2rem;" onclick="return confirm('¿Estás seguro de eliminar este departamento?')"></a>
              </td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
        <h3>EXPORTAR EN: </h3>
            <li class="nav-tabs">
              <a href="exportarpdfPaciente.php" target="_blank" class="bi bi-filetype-pdf" style="font-size: 3rem;"></a>
              <a href="exportarjsonPaciente.php" target="_blank" class="bi bi-filetype-json" style="font-size: 3rem;"></a>
              <a href="exportarcsvPaciente.php" target="_blank" class="bi bi-filetype-csv" style="font-size: 3rem;"></a>
              <a href="exportarxmlPaciente.php" target="_blank" class="bi bi-filetype-xml"style="font-size: 3rem;"></a>
              <a href="exportarxlsPaciente.php" target="_blank" class="bi bi-filetype-xls"style="font-size: 3rem;"></a>
            </li>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>