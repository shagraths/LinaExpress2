<?php

class Modeloexcel extends CI_Model {

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
    ##################################################################################################3
    ####################################################################    
    # CLIENTE
    function GuardarTrakingExcelCliente($nombre,$id_persona,$estado){          
        $fecha = date("Y"). "-". date("m") . "-" . date("d")." ". date("h").":". date("m").":00"; 
        #print_r($fecha);
        $datos = array(
            "NombreArchivo"=>$nombre,
            "FechaSubida"=> $fecha,
            "Id_Usuario"=>$id_persona,       
            "Estado" => $estado,            
        );                        
        $this->db->insert('ExcelCliente', $datos);        
        return 0;       

    }
    function GuardarArchivoExcelCliente($numero,$fEntrega,$tC,$nC,$rit,$receptor,$direccion,$ciudad,$tD,$telefono,$id_persona,$nombre,$ruta){          
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
            "FechaSubida"=>$fecha,
            'RutaCode'=>$ruta
        );                                
        $this->db->insert('Excel', $datos);           
        // trer id del insert para poder generar el archivo codigo de barra
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        
        return $insert_id;       

    }
    ##########################################################################################################

}

?>
