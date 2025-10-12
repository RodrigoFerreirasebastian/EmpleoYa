<?php
header("Content-Type: application/json; charset=utf-8");
include "conexion.php";

$sql = "SELECT id_contrato, titulo, salario, tipo_trabajo, email_contacto, descripcion 
        FROM contratar_personal ORDER BY id_contrato DESC";
$result = $conn->query($sql);

$contratar_personal = [];

while ($row = $result->fetch_assoc()) {
    $contratar_personal[] = $row;
}

echo json_encode($contratar_personal, JSON_UNESCAPED_UNICODE);

$conn->close();
?>
