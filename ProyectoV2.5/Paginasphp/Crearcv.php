<?php
include "../conexion/conexion.php"; 

$mensaje = ''; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    
    $nombre      = $conn->real_escape_string($_POST["nombre"] ?? '');
    $cedula      = $conn->real_escape_string($_POST["cedula"] ?? '');
    $edad        = $conn->real_escape_string($_POST["edad"] ?? '');
    $email       = $conn->real_escape_string($_POST["email"] ?? '');
    $telefono    = $conn->real_escape_string($_POST["telefono"] ?? '');
    $localidad   = $conn->real_escape_string($_POST["localidad"] ?? '');
    $experiencia = $conn->real_escape_string($_POST["experiencia"] ?? '');
    $educacion   = $conn->real_escape_string($_POST["educacion"] ?? '');
    
    
    if (empty($nombre) || empty($cedula) || empty($email)) {
        $mensaje = '<p style="color:red;">Error: Faltan campos obligatorios (Nombre, Cédula o Email).</p>';
    } else {
        // 3. Consulta SQL
        $sql = "INSERT INTO cv (nombre, cedula, edad, email, telefono, localidad, experiencia, educacion)
                VALUES ('$nombre', '$cedula', '$edad', '$email', '$telefono', '$localidad', '$experiencia', '$educacion')";

        if ($conn->query($sql) === TRUE) {
            $mensaje = '<p style="color:green;">CV creado correctamente.</p>';
            
            
        } else {
            $mensaje = '<p style="color:red;">Error al crear CV: ' . $conn->error . '</p>';
        }
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear CV</title>
  <link rel="stylesheet" href="../css/style3.css">
</head>
<body>
  <h1>Crear Currículum (CV)</h1>

  <?php echo $mensaje; ?>

  <form method="POST" action=""> 
    <label>Nombre completo:</label>
    <input type="text" name="nombre" required><br>

    <label>Cédula:</label>
    <input type="text" name="cedula" required><br>

    <label>Edad:</label>
    <input type="number" name="edad" required><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Número de teléfono:</label>
    <input type="text" name="telefono" required><br>

    <label>Localidad:</label>
    <input type="text" name="localidad" required><br>

    <label>Experiencia laboral:</label><br>
    <textarea name="experiencia" rows="4" cols="50"></textarea><br>

    <label>Formación / Estudios:</label><br>
    <textarea name="formacion" rows="4" cols="50"></textarea><br>

    <button type="submit">Guardar CV</button>
  </form>
</body>
</html>