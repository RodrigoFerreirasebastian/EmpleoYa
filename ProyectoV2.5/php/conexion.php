<?php
$conexion = mysqli_connect("localhost", "root", "568888939rfgs", "empleaya");

if ($conexion) {
    echo "Conexión exitosa a la base de datos";
} else {
    echo "Error de conexión: " . mysqli_connect_error();
}
?>