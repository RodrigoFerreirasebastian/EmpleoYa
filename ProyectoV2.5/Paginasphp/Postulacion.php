<?php
include "../conexion/conexion.php";

$id_oferta = $_POST['id_oferta'] ?? null;
$tipo_oferta = $_POST['tipo_oferta'] ?? null;

// Validar que los datos vengan del servidor (no manipulados)
if (!$id_oferta || !$tipo_oferta) {
    die("Datos inválidos.");
}

// Consultar según el tipo detectado automáticamente
if ($tipo_oferta === 'empresa') {
    $tabla = "oferta";
} else {
    $tabla = "contratar_personal";
}

// Buscar la oferta
$stmt = $conn->prepare("SELECT * FROM $tabla WHERE titulo = ?");
$stmt->bind_param("i", $titulo);
$stmt->execute();
$result = $stmt->get_result();
$oferta = $result->fetch_assoc();

if (!$oferta) {
    die("Oferta no encontrada.");
}

// Registrar la postulación en la tabla "postulaciones"
$stmt = $conn->prepare("INSERT INTO postulacion (id_postulacion, id_usuario, fecha_postulacion, id_contrato) VALUES (?, ?, NOW())");
$stmt->bind_param("is", $id_oferta, $tipo_oferta);
$stmt->execute();

echo "<h1>Postulación completada</h1>";
echo "<p>Te postulaste correctamente a la oferta:</p>";
echo "<ul>
        <li><strong>Título:</strong> {$oferta['titulo']}</li>
        <li><strong>Tipo de trabajo:</strong> {$oferta['tipo_trabajo']}</li>
        <li><strong>Salario:</strong> {$oferta['salario']}</li>
        <li><strong>Contacto:</strong> {$oferta['email_contacto']}</li>
      </ul>";
?>
