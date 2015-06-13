<?php

class Modelo extends CI_Model {
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
//TODO CIUDAD    
    function guardar_ciudad($tipo, $nombre, $obs, $estado) {
        $this->db->select('*');
        $this->db->where('nombre_ciudad', $nombre);
        $this->db->where('tipo_ciudad', $tipo);
        $cantidad = $this->db->get('Ciudad')->num_rows();
        if ($cantidad == 0) {
            $datos = array(
                "nombre_ciudad" => $nombre,
                "tipo_ciudad" => $tipo,
                "observacion" => $obs,
                "estado" => $estado
            );

            $this->db->insert('Ciudad', $datos);

            return 0;
        } else {
            return 1;
        }
    }

    function actualizar_ciudad($id, $tipo, $nombre, $obs, $estado) {
        $this->db->select('*');
        $this->db->where('id_ciudad', $id);
        $cantidad = $this->db->get('Ciudad')->num_rows();
        if ($cantidad == 1) {
            $datos = array(
                "nombre_ciudad" => $nombre,
                "tipo_ciudad" => $tipo,
                "observacion" => $obs,
                "estado" => $estado
            );
            $this->db->where('id_ciudad', $id);
            $this->db->update('Ciudad', $datos);
            return 0;
        } else {
            return 1;
        }
    }

    function consultar_ciudad() {
        $this->db->select('*');
        return $this->db->get("Ciudad");
    }
    
    function consultar_ciudad_activos() {
        $estado = 'ACTIVO';
        $this->db->select('*');        
        $this->db->where('estado', $estado);
        return $this->db->get("Ciudad");
    }

    function eliminar_ciudad($id_ciudad) {
        try {
            $this->db->select('*');
            $this->db->where('id_ciudad', $id_ciudad);
            $this->db->get('Ciudad');
            $data = array("id_ciudad" => $id_ciudad);
            $this->db->delete('Ciudad', $data);
            return 0;
        } catch (Exception $e) {
            return 1;
        }        

    }

    function guardar_tipo_carta($tipo, $obs, $estado) {
        $this->db->select('*');
        $this->db->where('tipo', $tipo);
        $cantidad = $this->db->get('Carta')->num_rows();
        if ($cantidad == 0) {
            $datos = array(
                "tipo" => $tipo,
                "observacion" => $obs,
                "estado" => $estado
            );

            $this->db->insert('Carta', $datos);

            return 0;
        } else {
            return 1;
        }
    }

    function actualizar_tipo_carta($id, $tipo, $obs, $estado) {
        $this->db->select('*');
        $this->db->where('id_carta', $id);
        $cantidad = $this->db->get('Carta')->num_rows();
        if ($cantidad == 1) {
            $datos = array(
                "tipo" => $tipo,
                "observacion" => $obs,
                "estado" => $estado
            );
            $this->db->where('id_carta', $id);
            $this->db->update('Carta', $datos);
            return 0;
        } else {
            return 1;
        }
    }

    function consultar_carta() {
        $this->db->select('*');
        return $this->db->get("Carta");
    }

    function eliminar_carta($id_carta) {
        $this->db->select('*');
        $this->db->where('id_carta', $id_carta);
        $this->db->get('Carta');
        $data = array("id_carta" => $id_carta);
        $this->db->delete('Carta', $data);
    }

//****************admin**************
    function GuardarUsuario($tipo, $nombre, $apellido, $rut, $sexo, $telefono, $direccion, $mail, $pass) {
        $this->db->select('*');
        $this->db->where('rut', $rut);
        $cantidad = $this->db->get('Usuario')->num_rows();
        //select * from + guardando numero de filas que sean = con el rut
        //si es mayor a 0 es que ya esta el rut
        if ($cantidad == 0) {
            //colocando datos en la bd
            //lo que esta en "" son los nombre de la bd
            $datos = array(
                "tipo" => $tipo,
                "nombre" => $nombre,
                "apellido" => $apellido,
                "rut" => $rut,
                "sexo" => $sexo,
                "telefono" => $telefono,
                "direccion" => $direccion,
                "mail" => $mail,
                "pass" => md5($pass)
            );
            //ingresamos ese arreglo a la tabla persona que esta en la base de datos                
            $this->db->insert('Usuario', $datos);

            //ahora se todo esta bien envio un cero como respuesta 
            //a welcome

            return 0;
        } else {
            return 1;
        }
    }

    function consultar_usuarios() {
        $this->db->select('*');
        return $this->db->get("Usuario");
    }
    function GuardarTraking($id_persona,$nombre){         
        $datos = array(
            "NombreEvento"=>"Subir Archivo",
            "Id_Usuario"=> $id_persona,
            "Fecha"=>"14-04-2015",       
            "Json_Evento" => "Fotos/".$nombre,            
        );                        
        $this->db->insert('Traking', $datos);        
        return 0;       

    }







    ##################################################################################################
    # SUPERVISOR
    function GuardarTrakingExcelSupervisor($nombre,$id_persona,$estado){          
        $fecha = date("Y"). "-". date("m") . "-" . date("d")." ". date("h").":". date("m").":00"; 
        #print_r($fecha);
        $datos = array(
            "NombreArchivo"=>$nombre,
            "FechaSubida"=> $fecha,
            "Id_Usuario"=>$id_persona,       
            "Estado" => $estado,            
        );                        
        $this->db->insert('ExcelSupervisor', $datos);        
        return 0;       

    }
    function GuardarArchivoExcel($numero,$fEntrega,$tC,$nC,$rit,$receptor,$direccion,$ciudad,$tD,$telefono,$id_persona,$nombre){          
        $fecha = date("Y"). "-". date("m") . "-" . date("d")." ". date("h").":". date("m").":00"; 
        #print_r($fecha);        
        $FechaEntrega = explode("/", $fEntrega);
        $FechaEntrega = $FechaEntrega[2]."-".$FechaEntrega[1]."-".$FechaEntrega[0];
        $datos = array(
            "N_Dato"=>$numero,
            "FechaEntrega"=>$FechaEntrega,
            "TipoCarta"=>$tC,
            "Rit"=>$rit,
            "NombreReceptor"=>$receptor,
            "Direccion"=>$direccion,
            "Ciudad"=>$ciudad,
            "TipoDestino"=>$tD,
            "Telefono"=>$telefono,            
            "Id_Usuario"=>$id_persona,  
            "NombreArchivo"=>$nombre,     
            "Estado" => '',
            "FechaSubida"=>$fecha
        );                        
        $this->db->insert('Excel', $datos);        
        return 0;       

    }

}

?>
