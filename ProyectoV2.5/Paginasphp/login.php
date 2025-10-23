<?php
session_start();
include "./aplicacion/presentacion/usuario.php"; 

$mensaje = ''; 

  if ($_SERVER["REQUEST_METHOD"] === "POST") {

        
        $email = $conn->real_escape_string($_POST["email"] ?? '');
        $cedula = $conn->real_escape_string($_POST["cedula"] ?? ''); // cedula es la contraseña

        loginUsuario($email, $cedula);

  }


$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" href="../css/style3.css">
</head>
<body>
  <h1>Iniciar Sesión (Aspirante)</h1>
  <?php echo $mensaje; ?>

  <form method="POST" action="">
    <label>Email de registro:</label>
    <input type="email" name="email" required><br>

    <label>Cédula:</label>
    <input type="text" name="cedula" required><br> 

    <button type="submit">Ingresar</button>
  </form>

  <p>¿No tienes CV? <a href="CrearCV.php" type="target_blank">Crea tu CV aquí</a></p>
</body>
</html>