<?php
include "../conexion/conexion.php";

// Verificar si llega el id_contrato
if (!isset($_GET['id_contrato'])) {
    die("No se encontró la oferta.");
}

$id_contrato = $_GET['id_contrato'];

// Traer datos de la oferta seleccionada
$sql = "SELECT titulo, nombre, tipo_trabajo, salario, email_contacto, descripcion
        FROM contratar_personal 
        WHERE id_contrato = $id_contrato";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("La oferta no existe.");
}

$ofertap = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
        <?php include "librerias.php" ?>
    <meta charset="UTF-8">
    <title>Postularme</title>
    <link rel="stylesheet" href="../css/style4.css">
</head>
<body>
<?php include "cabezal.php" ?>
<h2>Formulario de Postulación</h2>

<div class="contenedor-form">
    <h3>Oferta seleccionada</h3>
    <p><strong>Título:</strong> <?= $ofertap['titulo'] ?></p>
    <p><strong>Nombre:</strong> <?= $ofertap['nombre'] ?></p>
    <p><strong>Tipo de trabajo:</strong> <?= $ofertap['tipo_trabajo'] ?></p>
    <p><strong>Salario:</strong> <?= $ofertap['salario'] ?></p>
    <p><strong>Descripción:</strong> <?= $ofertap['descripcion'] ?></p>

    <hr>

    <form action="/proyectov2.5/Paginasphp/aplicacion/presentacion/GuardarPostulacionPer.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_contrato" value="<?= $id_contrato ?>">

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
