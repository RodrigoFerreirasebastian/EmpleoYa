<?php
include "../conexion/conexion.php"; 

$mensaje = ''; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    
    $id_contrato    = $conn->real_escape_string($_POST["id_contrato"] ?? '');
    $titulo         = $conn->real_escape_string($_POST["titulo"] ?? '');
    $salario        = $conn->real_escape_string($_POST["salario"] ?? '');
    $tipo_trabajo   = $conn->real_escape_string($_POST["tipo_trabajo"] ?? '');
    $email_contacto = $conn->real_escape_string($_POST["email_contacto"] ?? '');
    $descripcion    = $conn->real_escape_string($_POST["descripcion"] ?? '');
    
    
    if (empty($id_contrato) || empty($titulo) || empty($tipo_trabajo) || empty($email_contacto) || empty($descripcion)) {
        $mensaje = '<p style="color:red;"> Error: Faltan campos obligatorios.</p>';
    } else {
        
        $stmt = $conn->prepare("INSERT INTO contratar_personal (id_contrato, titulo, salario, tipo_trabajo, email_contacto, descripcion)
                                VALUES (?, ?, ?, ?, ?, ?)");
        
        $salario_db = !empty($salario) ? $salario : null;
        
        $stmt->bind_param("isssss", $id_contrato, $titulo, $salario_db, $tipo_trabajo, $email_contacto, $descripcion);

        if ($stmt->execute()) {
            $mensaje = '<p style="color:green;">Oferta de búsqueda personal publicada correctamente.</p>';
        } else {
            $mensaje = '<p style="color:red;">Error al publicar: ' . $stmt->error . '</p>';
        }

        $stmt->close();
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Publicar Oferta Busqueda Personal</title>
  <link rel="stylesheet" href="../css/style3.css">
</head>
<body>
  <h1>Publicar Nueva Oferta Busqueda Personas</h1>
  <?php echo $mensaje; ?>

  <form method="POST" action="">
    <label>ID contrato:</label>
    <input type="number" name="id_contrato" required><br>

    <label>Título:</label>
    <input type="text" name="titulo" required><br>

    <label>Salario:</label>
    <input type="number" name="salario" step="0.01"><br>

    <label>Tipo de trabajo:</label>
    <input type="text" name="tipo_trabajo" required><br>

    <label>Email de contacto:</label>
    <input type="email" name="email_contacto" required><br>

    <label>Descripción:</label><br>
    <textarea name="descripcion" rows="4" cols="50" required></textarea><br>

    <button type="submit">Guardar Oferta</button>
  </form>
</body>
</html>