<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Modelo');
    }


    public function index() {
        $this->load->view('Por_defecto/inicio');
    }

    function cargar_login() {
        $this->load->view('Por_defecto/login');
    }

    function cargar_vista_principal(){
    	$this->load->view('Por_defecto/paginaPrincipal');
    }

    function principal_supervisor() {
        $this->load->view('SUPERVISOR/Principal');
    }

    function principal_vendedor() {
        $this->load->view('VENDEDOR/Principal');
    }

    function principal_cliente() {
        $this->load->view('CLIENTE/Principal');
    }
    function subirArchivosCliente() {
        $this->load->view('CLIENTE/subirArchivos');
    }
    function menu_cliente() {
        $this->load->view('CLIENTE/menu');
    }
  
    function principal_admin() {
        $this->load->view('ADMINISTRADOR/Principal');
    }
    function menu_admin() {
        $this->load->view('ADMINISTRADOR/menu');
    }   
 
    function cargar_modalUsuario() {       
        $datos['nombre'] = $this->session->userdata('nombre');
        $datos['Perfil'] = $this->session->userdata('Perfil');
        $this->load->view('Por_defecto/modalUsuario', $datos);
    }
    
    function cargar_contenidoPaginaXusuario() {          
        $datos['cabeceraDerechoG'] = $this->input->post("accion");
        $datos['cabeceraDerechoc'] = $this->input->post("modulo");
        $datos['icono'] = $this->input->post("icono");
        $datos['cabeceraIzg'] = $this->input->post("modulo");
        $datos['cabeceraIzc'] = $this->input->post("accion");
        $this->load->view('Por_defecto/contenidoPagina', $datos);
    }

    function verificarLogin() {    	
        $valor = 0;
        $id = '';
        $nombre = '';
        $Perfil = '';
        $tipo = '';
        $estado = '';
        if ($this->session->userdata('esta_logueado') == true) {
            $valor = 1;            
            $id = $this->session->userdata('id');
            $nombre = $this->session->userdata('nombre');
            $Perfil = $this->session->userdata('Perfil');
            $estado = $this->session->userdata('estado');
            $tipo = $this->session->userdata('tipo');            
        }else{
            //$this->cerrar_sesion(); 
        }
        echo json_encode(array('valor' => $valor,
            'id' => $id,
            'nombre' => $nombre,
            'Perfil' => $Perfil,
            'estado'=>$estado,
            'tipo' => $tipo));
    }

    function conectar() {    	
        $id = '';
        $login = $this->input->post("nombre");
        $clave = $this->input->post("clave");
        $tipo = '';
        $rut = '';
        $estado = '';
        $valor = 0;
        $nombre = '';
        $Perfil = '';
        $cookie = array('id' => '', 'rut' => '', 'nombre' => '', 'Perfil' => '', 'tipo' => '','estado'=>'', 'esta_logueado' => false);
        if ($this->Modelo->conectar($login, $clave)->num_rows() == 1) {
            $data = $this->Modelo->conectar($login, $clave)->result();
            foreach ($data as $fila) {
                $id = $fila->ID;
                $rut = $fila->Rut;
                $nombre = $fila->Nombre;              
                $tipo = $fila->id_rol;
                $Perfil = $fila->Perfil;
                $estado = $fila->Estado_U;
            }
            if ($estado == 'ACTIVO') {
                $valor = 1;
                //update tabla usuario para colocar el 1
                $cookie = array('id' => $id, 'rut' => $rut, 'nombre' => $nombre, 'Perfil' => $Perfil, 'tipo' => $tipo,'estado'=>$estado, 'esta_logueado' => TRUE);
            }
        }
        $this->session->set_userdata($cookie);
        echo json_encode(array("valor" => $valor,
            "id" => $id,
            "nombre"=>$nombre,
            "Perfil"=>$Perfil,
            "tipo" => $tipo
        ));
    }

    function cerrar_sesion() {
        //hacer update de usuario
        //$id = $this->session->userdata('id');
        $this->session->sess_destroy();
        //buscar como hacer update de forma automatica para que otros usuarios vean al admin conectado
    }   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */