<?php

$servidor = "localhost";
$usuario = "root";
$clave = ""; 
$baseDatos = "empleaya"; 


$conn = new mysqli($servidor, $usuario, $clave, $baseDatos, 3306); 

if ($conn->connect_error) {
    
    die("Error FATAL de conexión a la base de datos: " . $conn->connect_error);
} 


?>