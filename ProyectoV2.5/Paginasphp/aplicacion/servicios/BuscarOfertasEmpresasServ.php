<?php
require_once __DIR__ . "/../persistencia/DaoOfertaP.php";

class BuscarOfertasEmpresas {
    
    
    public function buscarOfertasEmpresas() {
        $dao = new DaoOfertaEmpresas();
        $ofertasE= $dao->obtenerOfertasEmpresas();  
        return $ofertasE;       
    }
    
    public function calificarEmpresa($id_oferta, $calificacion, $comentario) {
        $dao = new DaoOfertaEmpresas();
        return $dao->guardarCalificacionEmpresa($id_oferta, $calificacion, $comentario);
    }

}
