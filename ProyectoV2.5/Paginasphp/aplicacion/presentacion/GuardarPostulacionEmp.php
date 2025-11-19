<?php
include "../../../conexion/conexion.php";

$id_oferta = $_POST['id_oferta'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

// SUBIR CV
$carpeta = "../uploads/";
if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}

$nombreArchivo = time() . "_" . basename($_FILES["cv"]["name"]);
$rutaArchivo = $carpeta . $nombreArchivo;


if (move_uploaded_file($_FILES["cv"]["tmp_name"], $rutaArchivo)) {

    // Guardar en la BD
    $sql = "INSERT INTO postulacion (id_empresa, nombre, email, telefono, cv) 
            VALUES ('$id_oferta', '$nombre', '$email', '$telefono', '$nombreArchivo')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<h2>¡Postulación enviada con éxito!</h2>";
        echo "<a href='../../../Paginasphp/BuscarOfertasEmpresas.php'>Volver</a>";
    } else {
        echo "Error al guardar la postulación: " . $conn->error;
    }

} else {
    echo "Error al subir el archivo.";
}

$conn->close();
?>
