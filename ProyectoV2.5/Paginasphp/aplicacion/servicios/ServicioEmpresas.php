<?php

require_once __DIR__ . "/../persistencia/DaoEmpresas.php";

class ServicioEmpresas {
    
    private $dao;

    public function __construct() {
        $this->dao = new DaoEmpresas();
    }

    public function obtenerEmpresas() {
        return $this->dao->obtenerEmpresas();
    }

}
