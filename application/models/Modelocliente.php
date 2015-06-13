<?php
	/**
	* 
	*/
class Modelocliente extends CI_Model{

   
    function tablaMisArchivosCliente(){
        $this->db->select('ExcelCliente.Id_ExcelCliente,ExcelCliente.NombreArchivo,ExcelCliente.FechaSubida,ExcelCliente.Estado,Usuario.Nombres,Usuario.Apellidos');
        $this->db->where('ExcelCliente.Estado','HABILITADO');
        $this->db->from('ExcelCliente');
        $this->db->join('Usuario','Usuario.ID=ExcelCliente.Id_Usuario');      
        return $this->db->get();         
    }
    

    function eliminarArchivo($id){
        $estado = 'DESHABILITADO';
        $this->db->select('*');
        $this->db->where('Id_ExcelCliente', $id);
        $cantidad = $this->db->get('ExcelCliente')->num_rows();
        if ($cantidad == 1) {
            $datos = array(               
                "Estado" => $estado
            );
            $this->db->where('Id_ExcelCliente', $id);
            $this->db->update('ExcelCliente', $datos);
            return 0;
        } else {
            return 1;
        }
    }


}

?>