<?php
require_once __DIR__ . "/../persistencia/DaoOfertaPersonas.php";


class ServicioPostulacion {
    
    private $daoOfertaPersonas;

    public function __construct() {
        $this->daoOfertaPersonas = new DaoOfertaPersonas();
    }

    public function guardarPostulacion($id_contrato,  $nombre, $email, $telefono) {
        if ( empty($nombre) || empty($email) || empty($telefono) ) {
            throw new Exception("Todos los campos obligatorios deben ser completados.");
        }
        return $this->daoOfertaPersonas->guardarPostulacion($id_contrato, $nombre, $email, $telefono);
    }

}
