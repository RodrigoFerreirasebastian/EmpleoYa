<?php
session_start();
include "conexion/conexion.php";

$esta_logueado = isset($_SESSION['logeado']) && $_SESSION['logeado'] === true;
$tiene_cv = false;


if ($esta_logueado) {
    $id_cv = $_SESSION['id_cv'] ?? 0;
    
    
    if ($id_cv > 0) {
        
        $sql = "SELECT id_cv FROM cv WHERE id_cv = $id_cv";
        $result = $conn->query($sql);
        $tiene_cv = $result->num_rows > 0;
        
    } else {
        
        $tiene_cv = false;
    }
}


if (isset($conn)) {
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina proyecto</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <header class="barra-navegacion">
        <div class="logo">
            <img src="imagenes/logo.png" alt="Logo">
        </div>
        <div class="link-navegacion">
            <a class="link-1" href="Paginasphp/BuscarOfertasEmpresas.php" type="target_blank">Buscar ofertas Empresas</a>
            <a class="link-2" href="Paginasphp/EvaluacionEmpresa.php" type="target_blank">Evaluaciones de empresa</a>
            <a class="link-3" href="Paginasphp/BuscarOfertasPersonas.php" type="target_blank">Buscar ofertas personas</a>
        </div>
        <div class="link2">
            <a class="link-4" href="Paginasphp/EmpresaPublic.php" type="target_blank">Publicar oferta Empresa</a>
            <a class="link-5" href="Paginasphp/PersonalPublic.php" type="target_blank">Publicar oferta personas</a>
        </div>
        <div class="botones-login">
            <button class="btn-login"><a href="Paginasphp/login.php" type="target_blank">Login</a></button>
            <button class="btn-cv"><a href="Paginasphp/CrearCV.php" type="target_blank">Crear CV</a></button>
        </div>

        <?php echo $_SESSION["nombre"] ?
    </div>
        </header>
        
    <section class="fondo">
        <div class="contenido-fondo">
            <div class="barra-busqueda">
                <input type="text" placeholder="Cargo o categoría">
                <input type="text" placeholder="Lugar">
                <button>Buscar empleos</button>
            </div>
        </div>
    </section>

    <section class="contenido">
        <h2>Últimas búsquedas</h2>
        <p>Aquí puedes poner enlaces o filtros de búsqueda recientes...</p>
    </section>

</body>
</html>