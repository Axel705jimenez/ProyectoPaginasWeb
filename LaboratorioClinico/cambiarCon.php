<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recuperar Contraseña</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body>

<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="imagenes/logo.png" style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">Recuperar Contraseña</h4>
                </div>

                <?php
                  if (isset($_POST["email"]) && isset($_POST["newPassword"]) && isset($_POST["confirmPassword"])) {
                    $email = $_POST["email"];
                    $newPassword = $_POST["newPassword"];
                    $confirmPassword = $_POST["confirmPassword"];

                    // Verificar si las contraseñas coinciden
                    if ($newPassword === $confirmPassword) {
                      // Realizar la conexión a la base de datos
                      // Aquí debes reemplazar 'host', 'usuario', 'contraseña' y 'basedatos' con los valores de tu configuración de base de datos
                      $conn = new mysqli('localhost', 'root', '', 'LaboratorioClinico');

                      // Verificar si hay errores en la conexión
                      if ($conn->connect_error) {
                        die("Error de conexión: " . $conn->connect_error);
                      }

                      // Encriptar la contraseña
                      $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                      // Actualizar la contraseña en la base de datos
                      $query = "UPDATE usuario SET clave = '$hashedPassword' WHERE correoElectronico = '$email'";
                      $result = $conn->query($query);

                      if ($result) {
                        // Mostrar mensaje de éxito
                        echo '<p class="text-center text-success">Contraseña actualizada exitosamente.</p>';

                        // Redireccionar a index.html después de 2 segundos
                        header("refresh:2; url=index.php");
                      } else {
                        echo '<p class="text-center text-danger">Error al actualizar la contraseña.</p>';
                        echo '<div class="text-center pt-1 mb-5 pb-1">
                          <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" onclick="window.history.back();">Volver a intentar</button>
                          <a class="text-muted" href="index.php">Volver al inicio de sesión</a>
                        </div>';
                      }

                      // Cerrar la conexión a la base de datos
                      $conn->close();
                    } else {
                      echo '<p class="text-center text-danger">Las contraseñas no coinciden.</p>';
                      echo '<div class="text-center pt-1 mb-5 pb-1">
                        <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" onclick="window.history.back();">Volver a intentar</button>
                        <a class="text-muted" href="index.php">Volver al inicio de sesión</a>
                      </div>';
                    }
                  } else {
                    // Mostrar el formulario inicial si no se enviaron los datos del formulario
                    echo '
                      <form method="POST" action="">
                        <div class="form-outline mb-4">
                          <label class="form-label" for="form2Example22">Nueva Contraseña</label>
                          <input type="password" name="newPassword" id="form2Example22" class="form-control" required />
                        </div>

                        <div class="form-outline mb-4">
                          <label class="form-label" for="form2Example23">Confirmar Contraseña</label>
                          <input type="password" name="confirmPassword" id="form2Example23" class="form-control" required />
                        </div>

                        <div class="text-center pt-1 mb-5 pb-1">
                          <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Guardar Contraseña</button>
                          <a class="text-muted" href="index.php">Volver al inicio de sesión</a>
                        </div>
                      </form>
                    ';
                  }
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>
