<?php
require_once __DIR__ . "/../../../conexion/conexion.php";
// include "./dominio/Personas.php";
class DaoOfertaEmpresas {
    
    
    public function obtenerOfertasEmpresas() {
    global $conn;

    $sql = "SELECT id_oferta, titulo, nombre, tipo_trabajo, salario, email_contacto, descripcion 
            FROM oferta ORDER BY id_oferta DESC";
    $result = $conn->query($sql);

    $ofertasempresas = [];

    if ($result && $result->num_rows > 0) {
        while ($fila = $result->fetch_assoc()) {
            $ofertasempresas[] = [
                'id_oferta' => $fila ['id_oferta'],
                'titulo' => $fila['titulo'],
                'nombre' => $fila['nombre'],
                'tipo_trabajo' => $fila['tipo_trabajo'],
                'salario' => $fila['salario'],
                'email_contacto' => $fila['email_contacto'],
                'descripcion' => $fila['descripcion']
            ];
        }
    }

    return $ofertasempresas; // ← devuelve todas las ofertas como un array de arrays
}
public function guardarCalificacionEmpresa($id_oferta, $calificacion, $comentario) {
    global $conn;

    $stmt = $conn->prepare("INSERT INTO evaluacion_empresa (id_empresa, calificacion, comentario) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $id_oferta, $calificacion, $comentario);

    if ($stmt->execute()) {
        return true;
    } else {
        throw new Exception("Error al guardar la calificación: " . $stmt->error);
    }

}
}