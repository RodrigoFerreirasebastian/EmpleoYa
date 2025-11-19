<?php

require_once __DIR__ . "/aplicacion/servicios/ServicioOfertas.php";


try {
    $servicioOfertas = new ServicioOfertas(); 
} catch (Throwable $t) {
    // Manejo de error si la clase no se puede instanciar
    die("Error al instanciar el servicio: " . $t->getMessage());
}


try {
    $ofertasP = $servicioOfertas->mostrarOfertasPer();

} catch (Exception $e) {
    
    $ofertasP = [];
    
    echo "Error al obtener ofertas: " . $e->getMessage();
}

if (!is_array($ofertasP)) {
    $ofertasP = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "librerias.php" ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Empleos</title>
    <link rel="stylesheet" href="../css/style2.css">
</head>
    <body>
        <?php include "cabezal.php" ?>
    <h1>Ofertas de Trabajo de personas</h1>

<table id="tablaOfertaspersonas">
    <tr>
        <th>Nombre</th>
        <th>Título</th>
        <th>Salario</th>
        <th>Tipo de trabajo</th>
        <th>Email de contacto</th>
        <th>Descripción</th>
        <th>Accion</th>
    </tr>
    <?php foreach ($ofertasP as $oferta): ?>
    <tr>
        <td><?= htmlspecialchars($oferta['nombre']) ?></td>
        <td><?= htmlspecialchars($oferta['titulo']) ?></td>
        <td><?= htmlspecialchars($oferta['salario']) ?></td>
        <td><?= htmlspecialchars($oferta['tipo_trabajo']) ?></td>
        <td><?= htmlspecialchars($oferta['email_contacto']) ?></td>
        <td><?= htmlspecialchars($oferta['descripcion']) ?></td>
        <td><a href="FormularioPostulacionPer.php?id_contrato=<?= htmlspecialchars($oferta['id_contrato']) ?>">Postular</a></td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>