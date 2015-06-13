<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controllerperfil extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Modeloperfil');
        //require_once('barcode.php');       
    }   

    function cargar_Perfil() {               
        $valor = 0;
        $id = '';
        $nombre = '';
        $Perfil = '';
        $tipo = '';
        $estado = '';
        if ($this->session->userdata('esta_logueado') == true) {
            $valor = 1;            
            $datos['nombre'] = $this->session->userdata('nombre');
        	$datos['Perfil'] = $this->session->userdata('Perfil');
        	$datos['estado'] = $this->session->userdata('estado'); 
            $datos['tipo'] = $this->session->userdata('tipo');              
        }else{
            //$this->cerrar_sesion(); 
        }
        $this->load->view('Perfil/index.php', $datos);
    }







}