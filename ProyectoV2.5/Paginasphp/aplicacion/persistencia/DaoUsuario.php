

<?php

class DaoUsuario {

    // obtener usuario
    public function obtenerUsuario($email, $clave) {
        global $conn;
        $sql = "SELECT id_cv, nombre, email, cedula FROM cv
                WHERE email = '$email' AND clave = '$clave'";

        $resultado = $conn->query($sql);
        if ($resultado && $resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $datoUsuario= [
                'id_cv' => $fila['id_cv'],
                'nombre' => $fila['nombre'],
                'email' => $fila['email'],
                'cedula' => $fila['cedula']
            ];
$datoUsuario["direccion"] = " ahsdgjasdgkajsgdkahsgd ksa"

            return $datoUsuario;
        } else {
            return null;
        }           
    }

    // obtener todos los usuario
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
        
    // insertar usuario
    public function insertarUsuario($id_cv, $nombre, $email, $cedula) {
        global $conn;
        $sql = "INSERT INTO cv (id_cv, nombre, email, cedula) VALUES ('$id_cv', '$nombre', '$email', '$cedula')";
        return $conn->query($sql);
    }

    // actualizar usuario
    public function actualizarUsuario($id_cv, $nombre, $email, $cedula) {
        global $conn;
        $sql = "UPDATE cv SET nombre = '$nombre', email = '$email', cedula = '$cedula' WHERE id_cv = $id_cv";
        return $conn->query($sql);
    }
    // eliminar usuario
    public function eliminarUsuario($id_cv) {
        global $conn;
        $sql = "DELETE FROM cv WHERE id_cv = $id_cv";
        return $conn->query($sql);
    }
}