<?php
require_once 'conexion.php';
// Verificar si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario y limpiarlos
    $nombre = limpiarEntrada($_POST["nombre"]);
    $aPaterno = limpiarEntrada($_POST["aPaterno"]);
    $aMaterno = limpiarEntrada($_POST["aMaterno"]);
    $email = limpiarEntrada($_POST["correo"]);
    $clave = limpiarEntrada($_POST["clave"]);

    // Validar los datos (puedes agregar más validaciones según tus necesidades)
    if (empty($nombre) || empty($aPaterno) || empty($aMaterno) || empty($email) || empty($clave)) {
        mostrarError("Todos los campos son obligatorios.");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        mostrarError("Correo electrónico no válido.");
    } else {

        // Verificar si el correo electrónico ya existe en la base de datos
        $consulta = "SELECT correoElectronico FROM usuario WHERE correoElectronico = ?";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            mostrarError("El correo electrónico ya está registrado.");
        } else {
            // Crear la consulta SQL para insertar los datos en la tabla usando una consulta preparada
            $sql = "INSERT INTO usuario (nombre, aPaterno, aMaterno, correoElectronico, clave) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conexion->prepare($sql);

            $hashedClave = password_hash($clave, PASSWORD_DEFAULT);

            // Pasar las variables por referencia en bind_param
            $stmt->bind_param("sssss", $nombre, $aPaterno, $aMaterno, $email, $hashedClave);

            if ($stmt->execute()) {
                header("Location: index.php"); // Redirigir al usuario a index.php
                exit(); // Finalizar el script después de la redirección
            } else {
                mostrarError("Error al insertar los datos: " . $stmt->error);
            }
        }

        // Cerrar la conexión a la base de datos
        $stmt->close();
        $conexion->close();
    }
}

// Función para limpiar los datos ingresados
function limpiarEntrada($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Función para mostrar un mensaje de error
function mostrarError($mensaje)
{
    echo "<div class='alert alert-danger'>$mensaje</div>";
}

// Función para mostrar un mensaje de éxito
function mostrarExito($mensaje)
{
    echo "<div class='alert alert-success'>$mensaje</div>";
}
?>
