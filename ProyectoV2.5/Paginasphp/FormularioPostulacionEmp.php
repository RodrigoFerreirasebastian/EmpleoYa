<?php
include "../conexion/conexion.php";

// Verificar si llega el id_contrato
if (!isset($_GET['id_oferta'])) {
    die("No se encontró la oferta.");
}

$id_oferta = $_GET['id_oferta'];

// Traer datos de la oferta seleccionada
$sql = "SELECT titulo, tipo_trabajo, salario, descripcion, nombre
        FROM oferta 
        WHERE id_oferta = $id_oferta";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("La oferta no existe.");
}

$ofertaE = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Postularme</title>
    <link rel="stylesheet" href="../css/style4.css">
</head>
<body>

<h2>Formulario de Postulación</h2>

<div class="contenedor-form">
    <h3>Oferta seleccionada</h3>
    <p><strong>Título:</strong> <?= $ofertaE['titulo'] ?></p>
    <p><strong>Nombre:</strong> <?= $ofertaE['nombre'] ?></p>
    <p><strong>Tipo de trabajo:</strong> <?= $ofertaE['tipo_trabajo'] ?></p>
    <p><strong>Salario:</strong> <?= $ofertaE['salario'] ?></p>
    <p><strong>Descripción:</strong> <?= $ofertaE['descripcion'] ?></p>

    <hr>

    <form action="./aplicacion/presentacion/GuardarPostulacionEmp.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_oferta" value="<?= $id_oferta ?>">

        <label>Nombre completo:</label>
        <input type="text" name="nombre" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Teléfono:</label>
        <input type="text" name="telefono" required>

        <label>Adjuntar CV (PDF):</label>
        <input type="file" name="cv" accept="application/pdf" required>

        <button type="submit" class="btn-enviar">Enviar Postulación</button>
    </form>
</div>

</body>
</html>
