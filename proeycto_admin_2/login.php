<?php


// Conexión a la base de datos
$servername = "localhost";
$username = "username";
$password = "";
$dbname = "usuarios";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión es exitosa
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Obtener los datos del formulario de inicio de sesión
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Verificar si los datos del usuario son correctos
$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contrasena='$contrasena'";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
  // Iniciar sesión y redirigir al usuario a la página de gerencia.html
  session_start();
  $_SESSION['usuario'] = $usuario;
  header('Location: gerencia.html');
} else {
  // Mostrar un mensaje de error si los datos del usuario son incorrectos
  echo "Usuario o contraseña incorrectos.";
}

$conn->close();
?>
