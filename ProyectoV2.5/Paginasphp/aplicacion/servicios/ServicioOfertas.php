<?php
require_once __DIR__ . "/../persistencia/DaoOfertaPersonas.php";
require_once __DIR__ . "/../persistencia/DaoOfertaEmpresas.php";

class ServicioOfertas {
    private $daoOfertaPersonas;

    public function __construct() {
        $this->daoOfertaPersonas = new DaoOfertaPersonas();
    }

    public function guardarOfertaPersonal($nombre, $titulo, $salario, $tipo_trabajo, $email_contacto, $descripcion) {
        if (empty($nombre) || empty($titulo) || empty($tipo_trabajo) || empty($email_contacto) || empty($descripcion)) {
            throw new Exception("Todos los campos obligatorios deben ser completados.");
        }
        return $this->daoOfertaPersonas->guardarOfertaPersonal($nombre, $titulo, $salario, $tipo_trabajo, $email_contacto, $descripcion);
    }

    public function mostrarOfertasPer() {
        return $this->daoOfertaPersonas->mostrarOfertasPer();
    }
    public function buscarOfertasEmpresas() {
        $dao = new DaoOfertaEmpresas();
        $ofertasE= $dao->obtenerOfertasEmpresas();  
        return $ofertasE;       
    }
}
