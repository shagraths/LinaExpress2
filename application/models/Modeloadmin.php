<?php
	/**
	* 
	*/
class Modeloadmin extends CI_Model{

    //SECTOR
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
        $this->db->select('Sector.id_sector,Sector.nombre_sector,Sector.ciudad,Ciudad.nombre_ciudad,Sector.observacion,Sector.estado');         
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
        $estado="INACTIVO";
        $this->db->select('*'); 
        $this->db->where('id_sector', $id);  
        $cantidad = $this->db->get('Sector')->num_rows();
            if ($cantidad == 1) {
                $datos = array(
                    "estado" => $estado
                );
                $this->db->where('id_sector', $id);
                $this->db->update('Sector', $datos);
                return 1;
            } else {
                return 0;
        }       
    }
    //CIUDAD    
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
    function consultar_perfil_activos(){
        $this->db->select('*');        
        return $this->db->get("Rol");
    }
    function eliminar_ciudad($id_ciudad) {        
        $estado="INACTIVO";

        $this->db->select('*');
        $this->db->where('ciudad', $id_ciudad);
        $tiene_sector = $this->db->get('Sector')->num_rows();

        if ($tiene_sector==0) {         
            $this->db->select('*');
            $this->db->where('Id_ciudad', $id_ciudad);
            $cantidad = $this->db->get('Ciudad')->num_rows();
            if ($cantidad == 1) {
                $datos = array(
                    "estado" => $estado
                );
                $this->db->where('Id_ciudad', $id_ciudad);
                $this->db->update('Ciudad', $datos);
                return 0;
            } else {
                return 1;
            }
       }
    }

    //CARTA
    function guardar_tipo_carta($tipo, $obs, $estado) {
        $this->db->select('*');
        $this->db->where('Nombre', $tipo);
        $cantidad = $this->db->get('TipoCarta')->num_rows();
        if ($cantidad == 0) {
            $datos = array(
                "Nombre" => $tipo,
                "Observacion" => $obs,
                "Estado" => $estado
            );            
            $this->db->insert('TipoCarta', $datos);

            return 1;
        } else {
            return 0;
        }
    }
    function actualizar_tipo_carta($id, $tipo, $obs, $estado) {
        $this->db->select('*');
        $this->db->where('Id_tipoCarta', $id);
        $cantidad = $this->db->get('TipoCarta')->num_rows();
        if ($cantidad == 1) {
            $datos = array(
                "Nombre" => $tipo,
                "Observacion" => $obs,
                "Estado" => $estado
            );
            $this->db->where('Id_tipoCarta', $id);
            $this->db->update('TipoCarta', $datos);
            return 1;
        } else {
            return 0;
        }
    }
    function consultar_carta() {
        $this->db->select('*');
        return $this->db->get('TipoCarta');
    }
    function eliminar_tipo_carta($Id_tipoCarta) {
        $estado="INACTIVO";         
        $this->db->select('*');
        $this->db->where('Id_tipoCarta', $Id_tipoCarta);
        $cantidad = $this->db->get('TipoCarta')->num_rows();
        if ($cantidad == 1) {
        $datos = array(
            "Estado" => $estado
            );
            $this->db->where('Id_tipoCarta', $Id_tipoCarta);
            $this->db->update('TipoCarta', $datos);
            return 1;
        } else {
            return 0;
        }
    }

    function consultar_usuario(){
        $estado="ACTIVO";
        $this->db->select('Usuario.ID,Usuario.Rut,Usuario.Nombres,Usuario.Apellidos,Rol.Perfil,Usuario.Estado_U');   
        $this->db->where('Estado_U', $estado);     
        $this->db->from('Usuario');
        $this->db->join('Rol','Rol.ID_r=Usuario.Id_rol');      
        return $this->db->get(); 
    }

    function guardar_user($rut, $nombres,$apellidos,$tipo_user, $estado,$user){
        
        $clave="1234";
        $estado_a="ACTIVO";
        $this->db->select('*');
        $this->db->where('Nombres', $nombres);
        $this->db->where('Apellidos', $apellidos);
        $this->db->where('Estado_U', $estado_a);
        $cantidad = $this->db->get('Usuario')->num_rows();
        if ($cantidad == 0) {
            $datos = array(
                "Rut" => $rut,
                "Login" => md5($user),
                "Clave" => md5($clave),
                "Nombres" => $nombres,
                "Apellidos" => $apellidos,
                "Id_rol" => $tipo_user,
                "Estado_U" => $estado
            );

            $this->db->insert('Usuario', $datos);

            return 1;
        } else {
            return 0;
        }
    }

    function actualizar_user($id_user, $rut, $nombres,$apellidos,$tipo_user, $estado){
        $this->db->select('*');
        $this->db->where('ID', $id_user);
        $cantidad = $this->db->get('Usuario')->num_rows();
        if ($cantidad == 1) {
            $datos = array(
                "Rut" => $rut,
                "Nombres" => $nombres,
                "Apellidos" => $apellidos,
                "Id_rol" => $tipo_user,
            );
            $this->db->where('ID', $id_user);
            $this->db->update('Usuario', $datos);
            return 1;
        } else {
            return 0;
        }
    }

    // function eliminar_user(id_user){
    //     $estado="INACTIVO";
    //     $this->db->select('*'); 
    //     $this->db->where('ID', $id_user);  
    //     $cantidad = $this->db->get('Usuario')->num_rows();
    //         if ($cantidad == 1) {
    //             $datos = array(
    //                 "Estado_U" => $estado
    //             );
    //             $this->db->where('ID', $id);
    //             $this->db->update('Usuario', $datos);
    //             return 1;
    //         } else {
    //             return 0;
    //     }       
    // }

   





    //REVISAR***********


    //USUARIOS
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

  

}

?>