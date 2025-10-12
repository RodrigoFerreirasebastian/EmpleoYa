<?php
header("Content-Type: application/json; charset=utf-8");
include "conexion.php";

$sql = "SELECT id_oferta, titulo, salario, tipo_trabajo, email_contacto, descripcion 
        FROM ofertas ORDER BY id_oferta DESC";
$result = $conn->query($sql);

$ofertas = [];

while ($row = $result->fetch_assoc()) {
    $ofertas[] = $row;
}

echo json_encode($ofertas, JSON_UNESCAPED_UNICODE);

$conn->close();
?>
