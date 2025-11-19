<?php
include __DIR__ . "/../../../conexion/conexion.php";

class DaoOfertaPersonas {
    public function guardarOfertaPersonal($nombre, $titulo, $salario, $tipo_trabajo, $email_contacto, $descripcion) {
        global $conn;
        $sql = "INSERT INTO contratar_personal (nombre, titulo, salario, tipo_trabajo, email_contacto, descripcion) 
                VALUES ('$nombre', '$titulo', '$salario', '$tipo_trabajo', '$email_contacto', '$descripcion')";
        
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            throw new Exception("Error al guardar la oferta: " . $conn->error);
        }
    }

    public function guardarPostulacion($id_contrato, $nombre, $email, $telefono) {
        global $conn;
        $sql = "INSERT INTO postulacion (id_contrato, nombre, email, telefono) 
                VALUES ('$id_contrato', '$nombre', '$email', '$telefono')";
        
        if ($conn->query($sql) === TRUE) { 
            return true;
        } else {
            throw new Exception("Error al guardar la oferta: " . $conn->error);
        }
    }

    public function mostrarOfertasPer (){
        global $conn;
        $sql = "
        SELECT t.id_contrato, t.nombre, t.titulo, t.salario, t.tipo_trabajo, t.email_contacto, t.descripcion
        FROM contratar_personal t";
        $result = $conn->query($sql);
        if (!$result) {
            throw new Exception("Error al obtener las ofertas: " . $conn->error);
        }
        return $result->fetch_all(MYSQLI_ASSOC);
}
}

