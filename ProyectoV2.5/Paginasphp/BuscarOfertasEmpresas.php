<?php
include "../conexion/conexion.php"; 


$sql = "SELECT titulo, tipo_trabajo, salario, email_contacto, descripcion 
        FROM oferta ORDER BY id_oferta DESC";
$result = $conn->query($sql);

if (!$result) {
    die("Error al consultar oferta: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BuscarOfertas</title>
    <link rel="stylesheet" href="../css/style2.css">
</head>
<body>
    <header class="barra">
        <div class="logo">
            <img src="../imagenes/logo.png" alt="Logo">
        <section class="buscador-ofertas-empresas">
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
    <h1>Ofertas de Trabajo de Empresas </h1>

<table id="tablaOfertasempresas">
    <thead>
    <tr class="tablas-ofertas-empresas">
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
            // Formatear salario
            echo "<td>" . ($oferta['salario'] ? "$" . number_format($oferta['salario'], 2, ',', '.') : "No especificado") . "</td>";
            echo "<td>" . htmlspecialchars($oferta['email_contacto']) . "</td>";
            echo "<td>" . htmlspecialchars($oferta['descripcion']) . "</td>";
            echo "<td><button class='btn-aplicar'>Aplicar</button></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No hay ofertas de trabajo disponibles.</td></tr>";
    }
    $conn->close();
    ?>
    </tbody>
</table>
</body>
</html>