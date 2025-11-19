<?php

include "./aplicacion/persistencia/DaoUsuario.php";

class NUsuario {

    public function login($email, $clave) {
        $dao = new DaoUsuario();
        $usuario = $dao->obtenerUsuario($email, $clave);  
        
        if ($usuario !== null) {
            $_SESSION['id_cv'] = $usuario['id_cv'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['email'] = $usuario['email'];
            $usuarioV = true;
        } else {
            $usuarioV = false;
        }
        return $usuarioV;
    }


} 
