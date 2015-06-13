<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controllercliente extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Modelocliente');
    }

    
    function tablaMisArchivosCliente() {
        $data = $this->Modelocliente->tablaMisArchivosCliente();
        $datos['cantidad'] = $data->num_rows();
        $datos['archivos'] = $data->result();
        $this->load->view('CLIENTE/GRILLAS/tablaMisArchivos', $datos);
    }

    function eliminarArchivo() {
        $id = $this->input->post("id");           
        $valor = 0;     
        if ($this->modelo->eliminarArchivo($id) == 0) {
            $valor = 0;
        }
        echo json_encode(array("valor" => $valor));
    }
   
}