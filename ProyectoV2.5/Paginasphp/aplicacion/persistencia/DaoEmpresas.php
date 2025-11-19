<?php
require_once __DIR__ . "/../../../conexion/conexion.php";


class DaoEmpresas {
    
    
    public function obtenerEmpresas() {
        global $conn;

        $sql = "SELECT id_empresa, nombre
                FROM empresa ORDER BY nombre DESC";
        $result = $conn->query($sql);

        $empresas = [];

        if ($result && $result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $empresas[] = [
                    'id_empresa' => $fila ['id_empresa'],
                    'nombre' => $fila['nombre']
                ];
            }
        }
        return $empresas; // ← devuelve todas las ofertas como un array de arrays
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