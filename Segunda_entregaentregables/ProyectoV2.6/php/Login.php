<?php
// Configuración de la base de datos
$servername = "localhost";
$username   = "root";      // Cambia según tu entorno
$password   = "568888939rfgs";          // Contraseña si tu MySQL tiene una
$dbname     = "empleaya"; // Nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar método
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Obtener datos enviados
    $email = $conn->real_escape_string($_POST["email"] ?? '');
    $password_hash = $conn->real_escape_string($_POST["password_hash"] ?? '');

    if (empty($email) || empty($password_hash)) {
        echo "Faltan datos.";
        exit;
    }

    // Buscar usuario
    $sql = "SELECT password_hash FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Verificar la contraseña (usa password_hash / password_verify)
        if (password_verify($password_hash, $row["password_hash"])) {
            echo "OK"; // Éxito
        } else {
            echo "Login incorrecto.";
        }
    } else {
        echo "Usuario no encontrado.";
    }

} else {
    echo "Método no permitido.";
}

$conn->close();
?>
