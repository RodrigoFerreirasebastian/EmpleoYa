

<?php
include "../conexion/conexion.php";
class DaoUsuario {
    
    
    public function obtenerUsuario($email, $clave) {
        global $conn;
        $emailescp = $conn->real_escape_string($email);
        $claveescp = $conn->real_escape_string($clave);
        $sql = "SELECT id_cv, nombre, email, cedula FROM cv
                WHERE email = '$emailescp' AND cedula = '$claveescp'";

        $Usuario = null;
        $resultado = $conn->query($sql);
        if ($resultado && $resultado->num_rows > 0) { 
            $fila = $resultado->fetch_assoc();
            $datoUsuario= [
                'id_cv' => $fila['id_cv'],
                'nombre' => $fila['nombre'],
                'email' => $fila['email'],
                'cedula' => $fila['cedula']
            ];
            $datoUsuario["direccion"] = " ahsdgjasdgkajsgdkahsgd ksa";
            $Usuario = $datoUsuario;
        } 
        $conn->close();
        return $Usuario;           
    }


    public function obtenerUsuarios() {
        global $conn;     
        $sql = "SELECT id_cv, nombre, email, cedula FROM cv";
        $resultado = $conn->query($sql);
        if ($resultado && $resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $datoUsuario= [
                'id_cv' => $fila['id_cv'],
                'nombre' => $fila['nombre'],
                'email' => $fila['email'],
                'cedula' => $fila['cedula']
            ];
            $datoUsuario["direccion"] = "yo que se";

            return $datoUsuario;
        } else {
            return null;
        }           
        
    }
    
    public function insertarUsuario($id_cv, $nombre, $email, $cedula) {
        global $conn;
        $sql = "INSERT INTO cv (id_cv, nombre, email, cedula) VALUES ('$id_cv', '$nombre', '$email', '$cedula')";
        return $conn->query($sql);
    }

    public function actualizarUsuario($id_cv, $nombre, $email, $cedula) {
        global $conn;
        $sql = "UPDATE cv SET nombre = '$nombre', email = '$email', cedula = '$cedula' WHERE id_cv = $id_cv";
        return $conn->query($sql);
    }

    public function eliminarUsuario($id_cv) {
        global $conn;
        $sql = "DELETE FROM cv WHERE id_cv = $id_cv";
        return $conn->query($sql);
    }
}