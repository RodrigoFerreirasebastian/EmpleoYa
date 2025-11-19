

<?php

include "./aplicacion/servicios/NUsuario.php";

function loginUsuario($email, $cedula){

    $usuario = new NUsuario(); 
    $usuarioV = $usuario->login($email, $cedula);
    if ($usuarioV === true) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error: Credenciales inválidas.";
    }
        

}
?>
<?php

