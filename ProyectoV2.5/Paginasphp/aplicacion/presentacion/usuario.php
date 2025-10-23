

<?php

include "./aplicacion/servicios/NUsuario.php";

function loginUsuario($email, $cedula){

    $usuario = new NUsuario();
    return $usuario->login($email, $cedula);

    
        

}