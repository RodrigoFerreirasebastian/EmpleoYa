<?php

include "../conexion/conexion.php";

$mensaje = ''; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    
    $id_empresa     = $_POST["id_empresa"] ?? '';
    $titulo         = $conn->real_escape_string($_POST["titulo"] ?? '');
    $salario        = $conn->real_escape_string($_POST["salario"] ?? '');
    $tipo_trabajo   = $conn->real_escape_string($_POST["tipo_trabajo"] ?? '');
    $email_contacto = $conn->real_escape_string($_POST["email_contacto"] ?? '');
    $descripcion    = $conn->real_escape_string($_POST["descripcion"] ?? '');

    
    if (empty($id_empresa) || !is_numeric($id_empresa) || empty($titulo) || empty($tipo_trabajo) || empty($email_contacto) || empty($descripcion)) {
        $mensaje = '<p style="color:red;">Error: Faltan campos obligatorios o el ID Empresa no es válido.</p>';
    } else {
        
        $id_empresa_esc = $conn->real_escape_string($id_empresa);

        
        $check_sql = "SELECT id_empresa FROM empresa WHERE id_empresa = '$id_empresa_esc'";
        $check_result = $conn->query($check_sql);

        if ($check_result->num_rows === 0) {
            
$insert_empresa_sql = "INSERT INTO empresa (id_empresa)
                    VALUES ('$id_empresa_esc')";

if (!$conn->query($insert_empresa_sql)) {
    
    die('<p style="color:red;font-weight:bold;">ERROR FATAL AL CREAR LA EMPRESA (Tabla `empresa`): ' . $conn->error . '</p>');
}


            if (!$conn->query($insert_empresa_sql)) {
                
                $mensaje = '<p style="color:red;">Error FATAL al crear la empresa ID ' . $id_empresa_esc . ': ' . $conn->error . '</p>';
                $conn->close();
                exit; 
            }
        }
        
        
        $stmt = $conn->prepare("INSERT INTO oferta (id_empresa, titulo, salario, tipo_trabajo, email_contacto, descripcion)
                                VALUES (?, ?, ?, ?, ?, ?)");
        
        $salario_db = !empty($salario) ? $salario : null;
        $stmt->bind_param("isssss", $id_empresa, $titulo, $salario_db, $tipo_trabajo, $email_contacto, $descripcion);

        
        if ($stmt->execute()) {
            $mensaje = '<p style="color:green;">Oferta publicada correctamente. (Empresa ID ' . $id_empresa . ' verificada/creada).</p>';
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
  <title>Publicar Oferta de Empresa</title>
  <link rel="stylesheet" href="../css/style3.css">
</head>
<body>
  <h1>Publicar Nueva Oferta de Empresa</h1>
  <?php echo $mensaje; ?>

  <form method="POST" action="">
    <label>ID Empresa:</label>
    <input type="number" name="id_empresa" required><br>

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