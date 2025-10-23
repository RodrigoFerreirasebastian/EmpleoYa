<?php
include "../conexion/conexion.php"; 


$sql = "SELECT id_contrato, titulo, salario, tipo_trabajo, email_contacto, descripcion 
        FROM contratar_personal ORDER BY id_contrato DESC";
$result = $conn->query($sql);

if (!$result) {
    die("Error al consultar ofertas personales: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Empleos</title>
    <link rel="stylesheet" href="../css/style2.css">
</head>
<body>
    <header class="barra">
        <div class="logo">
            <img src="../imagenes/logo.png" alt="Logo">
        <section class="buscador-ofertas-personas">
        <div class="inputs-busqueda">
                <input type="text" placeholder="Cargo o categoría"><br>
                <input type="text" placeholder="ubicación">
                <div class="buttonb">Buscar</div>
            </section>
            <section class="Login-CV">
            <button class="btn-login"><a href="login.php" type="target_blank">Login</a></button>
            <button class="btn-cv"><a href="CrearCV.php" type="target_blank">Crear CV</a></button>
            </section>
        </div>
    </header>
    <h1>Ofertas de Trabajo de personas</h1>

<table id="tablaOfertaspersonas">
    <thead>
    <tr class="tablas-ofertas-personas">
        <th class="T">Título</th>
        <th class="E">Tipo de Trabajo</th>
        <th class="U">Salario</th>
        <th class="C">Contacto</th>
        <th class="D">Descripción</th>
        <th class="A">Acción</th>
    </tr>
    </thead>
    <tbody>
    <?php 
    if ($result->num_rows > 0) {
        while($oferta = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($oferta['titulo']) . "</td>";
            echo "<td>" . htmlspecialchars($oferta['tipo_trabajo']) . "</td>";
            
            echo "<td>" . ($oferta['salario'] ? "$" . number_format($oferta['salario'], 2, ',', '.') : "No especificado") . "</td>";
            echo "<td>" . htmlspecialchars($oferta['email_contacto']) . "</td>";
            echo "<td>" . htmlspecialchars($oferta['descripcion']) . "</td>";
            echo "<td><button class='btn-aplicar'>Aplicar</button></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No hay ofertas de trabajo de personas disponibles.</td></tr>";
    }
    $conn->close();
    ?>
    </tbody>
</table>
</body>
</html>