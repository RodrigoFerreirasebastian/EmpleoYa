<?php
require_once __DIR__ . "/../servicios/ServicioOfertas.php";

$mensaje = '';
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombre    = $conn->real_escape_string($_POST["nombre"] ?? '');
    $titulo         = $conn->real_escape_string($_POST["titulo"] ?? '');
    $salario        = $conn->real_escape_string($_POST["salario"] ?? '');
    $tipo_trabajo   = $conn->real_escape_string($_POST["tipo_trabajo"] ?? '');
    $email_contacto = $conn->real_escape_string($_POST["email_contacto"] ?? '');
    $descripcion    = $conn->real_escape_string($_POST["descripcion"] ?? '');
    
    try {
        $servicioOfertas = new ServicioOfertas();
        $servicioOfertas->guardarOfertaPersonal($nombre, $titulo, $salario, $tipo_trabajo, $email_contacto, $descripcion);
        echo '<p style="color:green;">Oferta de búsqueda personal publicada correctamente.</p>';
        echo '<a href="/proyectov2.5/">Volver</a>';
    }  catch (Exception $e) {
        echo '<p style="color:red;">Error al publicar: ' . $e->getMessage() . '</p>';
        echo '<a href="/proyectov2.5/">Volver</a>';
        exit();
    }

}