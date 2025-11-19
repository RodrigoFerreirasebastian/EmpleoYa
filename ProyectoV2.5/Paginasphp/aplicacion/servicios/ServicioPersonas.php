<?php

require_once __DIR__ . "/../persistencia/DaoPersonas.php";

class ServicioPersonas {
    
    private $dao;

    public function __construct() {
        $this->dao = new DaoPersonas();
    }

    public function obtenerPersonas() {
        return $this->dao->obtenerPersonas();
    }

    public function guardarEvaluacionPersona($id_contrato, $calificacion, $comentario) {
    return $this->dao->guardarCalificacionPersona($id_contrato, $calificacion, $comentario);
    }
}
