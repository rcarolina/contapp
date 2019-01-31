<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Google_login extends CI_Controller {
public function __construct()
	{
		parent::__construct();
		$this->load->helper('utils');
		$this->load->model('Modelo_Usuario');
		$this->output->enable_profiler(true);
		$this->load->library('google');
		
		 
        date_default_timezone_set("Chile/Continental");
	}
public function index()
	{
        
		$data['google_login_url']=$this->google->get_login_url();
        $this->load->view('home',$data);
	}

 public function oauth2callback(){
        $google_data=$this->google->validate();
        $session_data=array(
                'name'=>$google_data['name'],
                'email'=>$google_data['email'],
                'source'=>'google',
                'profile_pic'=>$google_data['profile_pic'],
                'link'=>$google_data['link'],
                'sess_logged_in'=>1
                );
        $usuario=$this->Modelo_Usuario->search_user($google_data['id']);
        if ($usuario!=null) {

           $this->session->set_userdata('usuario',$usuario);
           
        }else{
            $nuevo_usuario=[
                    "correo"=>$google_data['email'],
                    "nombre"=>$google_data['name'],
                    "rut"=>"-",
                    "contrasena"=>"-",
                    "fecha_creacion"=>date("Y-m-d H:i:s"),
                    "status"=>true,
                    "oauth_provider"=>"GOOGLE",
                    "oauth_uuid"=>$google_data['id']
                ];
                $this->Modelo_Usuario->add_usuario($nuevo_usuario);
                $usuario=$this->Modelo_Usuario->search_user($google_data['id']);
                $this->session->set_userdata('usuario',$usuario);
                $this->session->set_userdata('mensaje_exito',"Registrado correctamente a través de Google. <br>Encuentra el código en tu email");
        }

        redirect('index.php/portal/home','refresh');
        //var_dump($google_data);
        
       
    }
}

/* End of file Google.php */
/* Location: ./application/controllers/Google.php */