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
    include('guardarlaboratorista.php');
    include('actualizarlaboratorista.php');
    include('eliminarlaboratorista.php');
   function obtenerEquipo() {
    global $conexion;
    $query = "SELECT * FROM laboratorista";
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
              <a href="medico.php" class="nav-link">
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
            <li class="nav-item">
              <a href="usuario.php" class="nav-link">
              <i class="bi bi-person-circle"></i>                
              <span class="text-black fw-bold">Usuarios</span>
              </a>
            </li>
          </ul>

        </div>
      </div>
      
      <div class="col-md-9">
        <div class="content">
        <h2><?php echo isset($_GET['edit']) ? 'Actualizar laboratorista' : 'Agregar laboratorista'; ?></h2>
        <form method="POST">
          <?php if (isset($_GET['edit'])): ?>
            <?php
              $id = $_GET['edit'];
              $query = "SELECT * FROM laboratorista WHERE idlaboratorista = $id";
              $result = mysqli_query($conexion, $query);
              $laboratorista = mysqli_fetch_assoc($result);
            ?>
            <input type="hidden" name="idLaboratorista" value="<?php echo $laboratorista['idLaboratorista']; ?>">
          <?php endif; ?>
          <div class="mb-3">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo isset($laboratorista) ? $laboratorista['nombre'] : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="aPaterno">Primer apellido</label>
            <input type="text" class="form-control" id="aPaterno" name="aPaterno" value="<?php echo isset($laboratorista) ? $laboratorista['aPaterno'] : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="aMaterno">Segundo apellido</label>
            <input type="text" class="form-control" id="aMaterno" name="aMaterno" value="<?php echo isset($laboratorista) ? $laboratorista['aMaterno'] : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="sexo">Sexo</label>
            <input type="text" class="form-control" id="sexo" name="sexo" value="<?php echo isset($laboratorista) ? $laboratorista['sexo'] : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="numTelefono">Numero de telefono</label>
            <input type="text" class="form-control" id="numTelefono" name="numTelefono" value="<?php echo isset($laboratorista) ? $laboratorista['numTelefono'] : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="correoElectronico">Correo electronico</label>
            <input type="text" class="form-control" id="correoElectronico" name="correoElectronico" value="<?php echo isset($laboratorista) ? $laboratorista['correoElectronico'] : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="especialidad">Especialidad</label>
            <input type="text" class="form-control" id="especialidad" name="especialidad" value="<?php echo isset($laboratorista) ? $laboratorista['especialidad'] : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="numLicencia">Numero de licencia</label>
            <input type="text" class="form-control" id="numLicencia" name="numLicencia" value="<?php echo isset($laboratorista) ? $laboratorista['numLicencia'] : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="expLaboral">Experiencia laboral</label>
            <input type="text" class="form-control" id="expLaboral" name="expLaboral" value="<?php echo isset($laboratorista) ? $laboratorista['expLaboral'] : ''; ?>">
          </div>
          <button type="submit" class="btn btn-success" name="submit" value="<?php echo isset($_GET['edit']) ? 'Actualizar' : 'Agregar'; ?>">
            <?php echo isset($_GET['edit']) ? 'Actualizar' : 'Agregar'; ?>
          </button>
          <a href="laboratorista.php" class="btn btn-secondary float-right">Nuevo</a>
        </form>
      </div>
      <table class="table table-striped">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Primer apellido</th>
              <th>Segundo apellido</th>
              <th>Sexo</th>
              <th>Numero de telefono</th>
              <th>Correo electronico</th>
              <th>Especialidad</th>
              <th>Numero de licencia</th>
              <th>Experiencia laboral</th>
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
              <td><?php echo $row['numTelefono']; ?></td>
              <td><?php echo $row['correoElectronico']; ?></td>
              <td><?php echo $row['especialidad']; ?></td>
              <td><?php echo $row['numLicencia']; ?></td>
              <td><?php echo $row['expLaboral']; ?></td>
              <td>
                <a href="laboratorista.php?edit=<?php echo $row['idLaboratorista']; ?>" class="bi bi-pencil-square text-dark"style="font-size: 1.2rem;"></a>
                <a href="laboratorista.php?delete=<?php echo $row['idLaboratorista']; ?>" class="bi bi-trash3 text-danger" style="font-size: 1.2rem;" onclick="return confirm('¿Estás seguro de eliminar este departamento?')"></a>
              </td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
        <h3>EXPORTAR EN: </h3>
            <li class="nav-tabs">
              <a href="exportarpdflaboratorista.php" target="_blank" class="bi bi-filetype-pdf" style="font-size: 3rem;"></a>
              <a href="exportarjsonlaboratorista.php" target="_blank" class="bi bi-filetype-json" style="font-size: 3rem;"></a>
              <a href="exportarcsvlaboratorista.php" target="_blank" class="bi bi-filetype-csv" style="font-size: 3rem;"></a>
              <a href="exportarxmllaboratorista.php" target="_blank" class="bi bi-filetype-xml"style="font-size: 3rem;"></a>
              <a href="exportarxlslaboratorista.php" target="_blank" class="bi bi-filetype-xls"style="font-size: 3rem;"></a>
            </li>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>