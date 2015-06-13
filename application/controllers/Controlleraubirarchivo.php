<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controlleraubirarchivo extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Modeloexcel');
        //require_once('barcode.php'); 
        $this->load->library('Zend');
    }   

    //TODO TXT    
    ###############################################################CLIENTE
    public function leerExcel() {        
        $status = "";
        $msg = "";

        $file_element_name = 'userfile';
        if ($status != "error") {
            $config['upload_path'] = './filesCliente/';
            $config['allowed_types'] = 'xlsx|xls';
            $config['max_size'] = 1024 * 8;
            $config['encrypt_name'] = false;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($file_element_name)) {                
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
            } else {                
                $data = $this->upload->data();  

                if ($this->session->userdata('esta_logueado') == true) {                    
                    $id_persona = $this->session->userdata('id');                   
                    $tipo = $this->session->userdata('tipo');
                } 
                
                if ($this->Modeloexcel->GuardarTrakingExcelCliente($data['file_name'],$id_persona, 'HABILITADO') == 0) {
                    $total = 0;
                } else {
                    $total = 1;
                }                      
            }
        }                
        echo json_encode(array('status' => $status, 'nombre' => $data['file_name'], 'msg' => $msg));
    }

    function MostrarExcel() {
        $nombre = $this->input->post('nombre');      
        $this->load->library('Excelcliente');
        $excel = $this->excelcliente->read_file($nombre);
        #print_r("excel");
        #print_r($excel);
        $datos['excel'] = $excel;
        $this->load->view('CLIENTE/GRILLAS/grilla_excel', $datos);                   
    }

    function guardar_excelCliente() {        
        $nombre = $this->input->post('nombre');
        $this->load->library('Excelcliente');

        $excel = $this->excelcliente->read_file($nombre);
   ;
        $i=0;
        $guardados=0;
        $total=0;
        $perdidos=0;
      
        if ($this->session->userdata('esta_logueado') == true) {                    
            $id_persona = $this->session->userdata('id');                   
            $tipo = $this->session->userdata('tipo');
        }
        
        $fecha = date("Y"). "-". date("m") . "-" . date("d")." ". date("h").":". date("m").":00"; 
        #$serv = $_SERVER['DOCUMENT_ROOT'] . "/";
        $ruta = "./codigBarra/".$fecha;
        if(!file_exists($ruta))
        {
            mkdir ($ruta, 0777);        
        }
        //GENERO LA IMAGEN CON EL CODIGO DE BARRA PARA OF
        //$code128 lleva el string a codificar
        $this->zend->load('Zend/Barcode');
        // $code128 = "1234567890kkk";
        // #Zend_Barcode::render('code128', 'image', array('text' => $code128), array());
        // $file = Zend_Barcode::draw('code128', 'image', array('text' => $code128), array());
        // #imagepng($file, "CodigBarra/" . $code128 . ".png", 9);
        // imagepng($file, './codigBarra/'.$fecha.'/'.$code128.".png");
                
        $cabecera = false;
        foreach ($excel as $row) {               
            if ($cabecera!=false) {
                $i = 0;
                foreach ($row as $valor) {                                                                      
                    $i++;
                    $total++;
                    $ruta = './codigBarra/'.$fecha.'/';                    
                    $idCodigo = $this->Modeloexcel->GuardarArchivoExcelCliente($i,$valor[1],$valor[2],$valor[3],$valor[4],$valor[5],$valor[6],$valor[7],$valor[8],$valor[9],$id_persona,$nombre,$ruta);               
                    if ( $idCodigo != 0) {
                        //la funcion retorna n° de id que tiene el dato de esta forma podermos generar el codigo de barra
                        $code128 = $idCodigo;
                        $file = Zend_Barcode::draw('code128', 'image', array('text' => $code128), array());
                        #imagepng($file, "CodigBarra/" . $code128 . ".png");
                        imagejpeg($file, './codigBarra/'.$fecha.'/'.$code128."codigo.jpg",100);
                        $guardados++;
                    } else {
                        $perdidos++;
                    }                                                                     
                }  
            }                      
            $cabecera = true;         
        }

        
        echo json_encode(array('total' => $total, 'guardados' => $guardados, 'perdidos' => $perdidos,'nombre' =>$nombre));
    }

    ###################################################################################################
    ####################################################################SUPERVISOR 
    public function leerExcelSupervisor() {
        $status = "";
        $msg = "";
        $id_persona = "";
        $tipo = "";        
        $total = 0;

        $file_element_name = 'userfile';
        if ($status != "error") {
            $config['upload_path'] = './filesSupervisor/';
            $config['allowed_types'] = 'xlsx|xls';
            $config['max_size'] = 1024 * 8;
            $config['encrypt_name'] = false;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($file_element_name)) {                
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
            } else {                
                $data = $this->upload->data(); 
                if ($this->session->userdata('esta_logueado') == true) {                    
                    $id_persona = $this->session->userdata('id');                   
                    $tipo = $this->session->userdata('tipo');
                }

                if ($this->Modeloexcel->GuardarTrakingExcelSupervisor($data['file_name'],$id_persona, 'HABILITADO') == 0) {
                    $total = 0;
                } else {
                    $total = 1;
                }
            }
        }                
        echo json_encode(array('status' => $status, 'nombre' => $data['file_name'], 'msg' => $msg));
    }

    function MostrarExcelSupervisor() {
        $nombre = $this->input->post('nombre');      
        $this->load->library('excelsupervisor');

        $excel = $this->excelsupervisor->read_file($nombre);
        $datos['excel'] = $excel;
        $this->load->view('SUPERVISOR/GRILLAS/grilla_excel', $datos);                   
    }

    function guardar_Excel() {
        $nombre = $this->input->post('nombre');
        $this->load->library('excelsupervisor');

        $excel = $this->excelsupervisor->read_file($nombre);
        $i=0;
        $guardados=0;
        $total=0;
        $perdidos=0;
      
        if ($this->session->userdata('esta_logueado') == true) {                    
            $id_persona = $this->session->userdata('id');                   
            $tipo = $this->session->userdata('tipo');
        }
        foreach ($excel as $row) {
            if ($i==0) {
                    $i++;
                }else{
                    $i++;
                    $total++;
                    if ($this->Modeloexcel->GuardarArchivoExcel($i,$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9],$row[10],$id_persona,$nombre) == 0) {
                        $guardados++;
                    } else {
                        $perdidos++;
                    }                    
                }
        }

        
        echo json_encode(array('total' => $total, 'guardados' => $guardados, 'perdidos' => $perdidos));
    }

   ####################################################################################################################

}