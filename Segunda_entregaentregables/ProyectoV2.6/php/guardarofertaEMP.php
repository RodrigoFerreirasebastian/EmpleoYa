<?php
header("Content-Type: application/json; charset=utf-8");
include "conexion.php";

if (
    empty($_POST["id_empresa"]) ||
    empty($_POST["titulo"]) ||
    empty($_POST["tipo_trabajo"]) ||
    empty($_POST["email_contacto"]) ||
    empty($_POST["descripcion"])
) {
    echo json_encode(["success" => false, "message" => "Faltan campos obligatorios"]);
    exit;
}

$id_empresa = $_POST["id_empresa"];
$titulo = $_POST["titulo"];
$salario = !empty($_POST["salario"]) ? $_POST["salario"] : null;
$tipo_trabajo = $_POST["tipo_trabajo"];
$email_contacto = $_POST["email_contacto"];
$descripcion = $_POST["descripcion"];

$stmt = $conn->prepare("INSERT INTO ofertas (id_empresa, titulo, salario, tipo_trabajo, email_contacto, descripcion)
                        VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssss", $id_empresa, $titulo, $salario, $tipo_trabajo, $email_contacto, $descripcion);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => $stmt->error]);
}

$stmt->close();
$conn->close();
?>
