<?php 

include "../conexion/conexion.php";

$mensaje = ''; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombre         = $_POST["nombre"] ?? '';
    $titulo         = $conn->real_escape_string($_POST["titulo"] ?? '');
    $salario        = $conn->real_escape_string($_POST["salario"] ?? '');
    $tipo_trabajo   = $conn->real_escape_string($_POST["tipo_trabajo"] ?? '');
    $email_contacto = $conn->real_escape_string($_POST["email_contacto"] ?? '');
    $descripcion    = $conn->real_escape_string($_POST["descripcion"] ?? '');

    if (empty($nombre) || empty($titulo) || empty($tipo_trabajo) || empty($email_contacto) || empty($descripcion)) {
        $mensaje = '<p style="color:red;">Error: Faltan campos obligatorios o el Nombre de la Empresa no es válido.</p>';
    } else {

        $nombre_esc = $conn->real_escape_string($nombre);

        $check_sql = "SELECT nombre FROM empresa WHERE nombre = '$nombre_esc'";
        $check_result = $conn->query($check_sql);

        if ($check_result->num_rows === 0) {

            $insert_empresa_sql = "INSERT INTO empresa (nombre) VALUES ('$nombre_esc')";

            if (!$conn->query($insert_empresa_sql)) {
                die('<p style="color:red;font-weight:bold;">ERROR FATAL AL CREAR LA Publicacion (Tabla `empresa`): ' . $conn->error . '</p>');
            }
        } 

        $stmt = $conn->prepare("INSERT INTO oferta (nombre, titulo, salario, tipo_trabajo, email_contacto, descripcion)
                                VALUES (?, ?, ?, ?, ?, ?)");

        $salario_db = !empty($salario) ? $salario : null;
        $stmt->bind_param("ssssss", $nombre, $titulo, $salario_db, $tipo_trabajo, $email_contacto, $descripcion);

        if ($stmt->execute()) {
            $mensaje = '<p style="color:green;">Oferta publicada correctamente. (Empresa: ' . $nombre . ' verificada/creada).</p>';
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
    <?php include "librerias.php" ?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Publicar Oferta de Empresa</title>
<link rel="stylesheet" href="../css/style3.css">
</head>

<body>
    <?php include "cabezal.php" ?>
<h1>Publicar Nueva Oferta de Empresa</h1>
<?php echo $mensaje; ?>

<form method="POST" action="">
    <label>Nombre Empresa:</label>
    <input type="text" name="nombre" required><br>

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