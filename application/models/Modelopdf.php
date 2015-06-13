<?php

class Modelopdf extends CI_Model {

    function traerDatosNombre($nombreArchivo){
        $this->db->select('*');         
        $this->db->where('NombreArchivo', $nombreArchivo);        
        return $this->db->get('Excel');            
    }

}

?>
