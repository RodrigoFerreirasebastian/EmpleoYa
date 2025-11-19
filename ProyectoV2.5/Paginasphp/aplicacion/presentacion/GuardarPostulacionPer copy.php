<?php

require_once __DIR__ . "/../servicios/BuscarOfertasPersonasServ.php";

$mensaje = '';
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombre    = $conn->real_escape_string($_POST["nombre"] ?? '');
    $email         = $conn->real_escape_string($_POST["email"] ?? '');
    $telefono        = $conn->real_escape_string($_POST["telefono"] ?? '');
    $id_contrato   = $conn->real_escape_string($_POST["id_contrato"] ?? '');
    
    try {
        $servPostulacion = new ServicioPostulacion();
        $servPostulacion->guardarPostulacion($id_contrato, $nombre, $email, $telefono);
            echo '<p style="color:green;">Oferta de búsqueda personal publicada correctamente.</p>';
            echo '<a href="/proyectov2.5/Paginasphp/BuscarOfertasPersonas.php">Volver a ofertas de personal</a>';
        }  catch (Exception $e) {
        echo '<p style="color:red;">Error al publicar: ' . $e->getMessage() . '</p>';
        //header("Location: /proyectov2.5/Paginasphp/BuscarOfertasPersonas.php");
        exit();
    }

try {
    $servPostulacion = new ServicioPostulacion();
    $ofertasP = $servPostulacion->MostrarPostulacionPer();
} catch (Exception $e) {
    die("Error al obtener las ofertas: " . $e->getMessage());

}

}