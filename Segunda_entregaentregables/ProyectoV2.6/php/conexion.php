<?php
$servidor = "localhost";
$usuario = "root";
$clave = "568888939rfgs"; // ← si MySQL no tiene contraseña
$baseDatos = "empleaya";

$conexion = new mysqli($servidor, $usuario, $clave, $baseDatos);

if ($conexion->connect_error) {
    die("❌ Error al conectar con la base de datos: " . $conexion->connect_error);
} else {
    echo "✅ Conexión exitosa a la base de datos.";
}
?>
