<?php
// Configuración de la base de datos
$servername = "localhost";
$username   = "root";      // Cambia si tienes otro usuario
$password   = "568888939rfgs";          // Cambia si tienes contraseña
$dbname     = "empleaya"
// Conectar a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar que los datos llegaron por POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Escapar datos recibidos
    $id_usuario   = $conn->real_escape_string($_POST["id_usuario"] ?? '');
    $educacion    = $conn->real_escape_string($_POST["educacion"] ?? '');
    $experiencia  = $conn->real_escape_string($_POST["experiencia"] ?? '');
    $resumen      = $conn->real_escape_string($_POST["resumen"] ?? '');

    // Validar campos (ejemplo simple)
    if (empty($id_usuario) || empty($educacion)) {
        echo "Faltan campos obligatorios.";
        exit;
    }

    // Insertar en la base de datos
    $sql = "INSERT INTO cv (id_usuario, educacion, experiencia, resumen)
            VALUES ('$id_usuario', '$educacion', '$experiencia', '$resumen')";

    if ($conn->query($sql) === TRUE) {
        echo "OK"; // Esto lo usa tu JS para mostrar el mensaje correcto
    } else {
        echo "Error al guardar: " . $conn->error;
    }

} else {
    echo "Método no permitido.";
}

// Cerrar conexión
$conn->close();
?>
