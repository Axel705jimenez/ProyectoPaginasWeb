<?php
require_once 'conexion.php';
session_start();

if (isset($_POST["email"]) && isset($_POST["password"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Realizar la conexión a la base de datos
  $conn = new mysqli('localhost', 'root', '', 'LaboratorioClinico');

  // Verificar si hay errores en la conexión
  if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
  }

  // Consultar la base de datos para verificar las credenciales
  $query = "SELECT * FROM usuario WHERE correoElectronico = '$email'";
  $result = $conn->query($query);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashedPassword = $row["clave"];

    // Verificar la contraseña
    if (password_verify($password, $hashedPassword)) {
      // Las credenciales son válidas, crear una sesión y redirigir al usuario a pagina.php
      $_SESSION["email"] = $email;
      header("Location: pagina.php");
      exit;
    } else {
      echo '<p class="text-center text-danger">Correo electrónico o contraseña incorrectos.</p>';
    }
  } else {
    echo '<p class="text-center text-danger">El correo electrónico no está registrado.</p>';
  }

  // Cerrar la conexión a la base de datos
  $conn->close();
}
?>