<?php
require_once __DIR__ . "/../../../conexion/conexion.php";

class DaoPersonas {
    
    
    public function obtenerPersonas() {
        global $conn;

        $sql = "SELECT id_contrato, nombre
                FROM contratar_personal ORDER BY nombre DESC";
        $result = $conn->query($sql);

        $personas = [];

        if ($result && $result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $personas[] = [
                    'id_contrato' => $fila ['id_contrato'],
                    'nombre' => $fila['nombre']
                ];
            }
        }
        return $personas; // ← devuelve todas las ofertas como un array de arrays
    }

    public function guardarCalificacionPersona($id_contrato, $calificacion, $comentario) {
        global $conn;

        $stmt = $conn->prepare("INSERT INTO evaluacione_persona (id_contrato, calificacion, comentario) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $id_contrato, $calificacion, $comentario);

        if ($stmt->execute()) {
            return true;
        } else {
            throw new Exception("Error al guardar la calificación: " . $stmt->error);
        }

    }
    
}