<?php

include "../persistencia/DaoUsuario.php";

class NUsuario {

    public function login($email, $clave) {
        $dao = new DaoUsuario();
        $usuario = $dao->obtenerUsuario($email, $clave);  
        
        if ($usuario !== null) {
            $fila = $resultado->fetch_assoc();
            $_SESSION['id_cv'] = $usuario['id_cv'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['email'] = $usuario['email'];
            return "Inicio de sesión exitoso. ¡Bienvenido, " . $usuario['nombre'] . "!";
        } else {
            return "Error: Credenciales inválidas.";
        }   

        

    }


} 
