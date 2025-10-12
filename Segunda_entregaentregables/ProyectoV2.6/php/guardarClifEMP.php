<?php
// Configuración de la base de datos
$servername = "localhost";
$username   = "root";      // Cambia según tu entorno
$password   = "568888939rfgs";          // Si tu MySQL tiene contraseña, ponla aquí
$dbname     = "empleaya"; // Nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar método
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Obtener y limpiar datos
    $tipo        = $conn->real_escape_string($_POST["tipo"] ?? '');
    $id_empresa  = $conn->real_escape_string($_POST["id_empresa"] ?? '');
    $id_usuario  = $conn->real_escape_string($_POST["id_usuario"] ?? '');
    $calificacion = $conn->real_escape_string($_POST["calificacion"] ?? '');
    $comentario  = $conn->real_escape_string($_POST["comentario"] ?? '');

    // Validaciones básicas
    if (empty($tipo) || empty($calificacion)) {
        echo "Faltan campos obligatorios.";
        exit;
    }

    // Decidir tabla o inserción según el tipo
    if ($tipo === "empresa") {

        if (empty($id_empresa)) {
            echo "Falta el ID de la empresa.";
            exit;
        }

        $sql = "INSERT INTO evaluaciones_empresas (id_empresa, calificacion, comentario)
                VALUES ('$id_empresa', '$calificacion', '$comentario')";

    } elseif ($tipo === "persona") {

        if (empty($id_usuario)) {
            echo "Falta el ID del usuario.";
            exit;
        }

        $sql = "INSERT INTO evaluaciones_personas (id_usuario, calificacion, comentario)
                VALUES ('$id_usuario', '$calificacion', '$comentario')";

    } else {
        echo "Tipo de evaluación no válido.";
        exit;
    }

    // Ejecutar y responder
    if ($conn->query($sql) === TRUE) {
        echo "OK";
    } else {
        echo "Error al guardar: " . $conn->error;
    }

} else {
    echo "Método no permitido.";
}

// Cerrar conexión
$conn->close();
?>
