<?php
require_once __DIR__ . "/../conexion/conexion.php"; 
require_once __DIR__ . "/aplicacion/servicios/ServicioOfertas.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "librerias.php" ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BuscarOfertas</title>
    <link rel="stylesheet" href="../css/style2.css">
</head>
<body>
    <?php include "cabezal.php" ?>
    <h1>Ofertas de Trabajo de Empresas </h1>

<table id="tablaOfertasempresas">
    <thead>
    <tr class="tablas-ofertas-empresas">
        <th class="T">Título</th>
        <th class="N">Nombre</th>
        <th class="E">Tipo de Trabajo</th>
        <th class="U">Salario</th>
        <th class="C">Contacto</th>
        <th class="D">Descripción</th>
        <th class="A">Acción</th>
    
    </tr>
    </thead>
    <tbody>
    
<?php
$datos = new ServicioOfertas();
$result = $datos->buscarOfertasEmpresas();
foreach($result as $oferta){
    echo "<tr>";
    echo "<td>".$oferta['titulo']."</td>";
    echo "<td>".$oferta['nombre']."</td>";
    echo "<td>".$oferta['tipo_trabajo']."</td>";
    echo "<td>".$oferta['salario']."</td>";
    echo "<td>".$oferta['email_contacto']."</td>";
    echo "<td>".$oferta['descripcion']."</td>";
    echo "<td><a href='FormularioPostulacionEmp.php?id_oferta=".$oferta['id_oferta']."'>Aplicar</a></td>";
    echo "</tr>";
}
    $conn->close();
?>

    </tbody>
</table>
</body>
</html>