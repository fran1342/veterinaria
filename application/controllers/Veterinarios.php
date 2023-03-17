<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Veterinarios extends CI_Controller {

        function __construct(){
                parent::__construct();
                $this->_check_session();
                $this->load->model('DAO');
        }

	public function index(){
                $this->load->view('includes/header');
                $this->load->view('includes/menu');
                $this->load->view('includes/navbar');
                $this->load->view('veterinarios/Veterinarios_page');
                $this->load->view('includes/footer');
                $this->load->view('veterinarios/Veterinariosjs');
        }

        function abrir_formulario(){
                if($this->input->is_ajax_request()){

                        $sql =  "SELECT * FROM tb_usuarios WHERE tipo_usuario in(?) AND estatus_usuario = 'Activo'";
                        $data['veterinarios'] = $this->DAO->consultarQueryNativo($sql,array('Veterinario'));

                        if ($this->input->get('codigo_medico') && $this->input->get('accion')) {
                                $filtro = array(
                                        'id_medico' => $this->input->get('codigo_medico')
                                );
                                $medico_buscar = $this->DAO->consultarEntidad('vista_medicos',$filtro,TRUE);
                                if ($medico_buscar) {
                                        $data['accion']=$this->input->get('accion');
                                        $data['medico_seleccionado'] = $medico_buscar;
                                        echo $this->load->view('veterinarios/Veterinarios_form',$data,TRUE);
                                } else {
                                        echo "error";
                                }
                                
                        }else{
                                echo $this->load->view('veterinarios/Veterinarios_form',null,TRUE);
                        }
                }else{
                        redirect('home');
                }
        }

        function mostrarContenido(){
                if ($this->input->is_ajax_request()) {
                   
                    $sql =  "SELECT * FROM vista_medicos WHERE tipo_usuario in(?) AND estatus_usuario = 'Activo'";
                    $data['veterinarios'] = $this->DAO->consultarQueryNativo($sql,array('Veterinario'));
                    echo $this->load->view('veterinarios/Veterinarios_contenido',$data,TRUE);
                }else{
                    redirect('home');
                }
                
            }

        private function randomPassword() {
                $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                $pass = array(); 
                $alphaLength = strlen($alphabet) - 1; 
                for ($i = 0; $i < 8; $i++) {
                        $n = rand(0, $alphaLength);
                        $pass[] = $alphabet[$n];
                }
                return implode($pass); 
        }

        private function _check_session(){
                $session=$this->session->userdata('veterinaria_sess');
                if (!@$session->user_usuario) {
                        redirect('login');
                }
        }

      
}
