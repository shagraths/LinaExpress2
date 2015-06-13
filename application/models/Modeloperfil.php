<?php

class Modeloperfil extends CI_Model {
    function conectar($login, $clave) {        
        $this->db->select('Usuario.ID,Usuario.Rut,Usuario.Estado_U,Usuario.Nombres as Nombre,Usuario.id_rol,Rol.Perfil');
        $this->db->where('Login', md5($login));
        $this->db->where('Clave', md5($clave));
        $this->db->from('Usuario');
        $this->db->join('Rol','Rol.ID_r = Usuario.id_rol');
        return $this->db->get();
    }
//TODO SECTOR
    function guardar_sector($s_c, $nombre, $obs, $estado){            
        $this->db->select('*');
        $this->db->where('nombre_sector', $nombre);
        $this->db->where('ciudad', $s_c);
        $cantidad = $this->db->get('Sector')->num_rows();
        if ($cantidad == 0) {
            $datos = array(
                "nombre_sector" => $nombre,
                "ciudad" => $s_c,
                "observacion" => $obs,
                "estado" => $estado
            );

            $this->db->insert('Sector', $datos);

            return 0;
        } else {
            return 1;
        }
    
    }
    function consultar_sector(){
        $this->db->select('Sector.id_sector,Sector.nombre_sector,Ciudad.nombre_ciudad,Sector.observacion,Sector.estado');         
        $this->db->from('Sector');
        $this->db->join('Ciudad','Ciudad.id_ciudad=Sector.ciudad');      
        return $this->db->get();         
    }
    function actualizar_sector($id, $s_c, $nombre, $obs, $estado){
        $this->db->select('*');
        $this->db->where('id_sector', $id);
        $cantidad = $this->db->get('Sector')->num_rows();
        if ($cantidad == 1) {
            $datos = array(
                "nombre_sector" => $nombre,
                "ciudad" => $s_c,
                "observacion" => $obs,
                "estado" => $estado
            );
            $this->db->where('id_sector', $id);
            $this->db->update('Sector', $datos);
            return 0;
        } else {
            return 1;
        }
    }
    function eliminar_sector($id){        
        try {
            $this->db->select('*');
            $this->db->where('id_sector', $id);
            $this->db->get('Sector');
            $data = array("id_sector" => $id);
            $this->db->delete('Sector', $data); 
            return 0;
        } catch (Exception $e) {
            return 1;
        }
               
    }


}

?>
