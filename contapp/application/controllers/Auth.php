<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('utils');
		$this->load->model('Modelo_Usuario');
		$this->output->enable_profiler(true);
		$this->load->library('google');
		$this->load->library('session');
		 
        date_default_timezone_set("Chile/Continental");
	}
	

  /* public function logout(){
        session_destroy();
        unset($_SESSION['access_token']);
        $session_data=array(
                'sess_logged_in'=>0);
        $this->session->set_userdata($session_data);
        redirect(base_url());
    }*/
	public function index()
    {
    
		redirect('index.php/auth/login','refresh');
		
    }

    public function registro()
    {
    	$this->load->view('auth/registro');

    }

    public function login()
    {
		//$data['google_login_url']=$this->google->get_login_url();
		$data["url"]=$this->google->get_login_url();
    	$this->load->view('auth/login',$data);

    }

   public function logout(){
		$this->session->unset_userdata('usuario');
		redirect('index.php/auth/login','refresh');
	}

	public function iniciar_session(){
		/*$correo=$this->input->post('correo');
		$contrasena=$this->input->post('contrasena');*/
		$usuario=$this->Modelo_Usuario->validar_login($this->input->post('correo'),$this->input->post('contrasena'));

		if ($usuario!=null) {
			$this->session->set_userdata('usuario',$usuario);
			redirect('index.php/portal/home','refresh'); //ACCESO A PORTAL
		}else{
			$this->session->set_userdata('error',"Datos incorrectos");
			redirect('index.php/auth/login','refresh');
		}
		

	}

	public function inicio(){
		$this->load->view('auth/inicio');
	}

	public function add_usuario()
	{
		$this->load->model('Modelo_Usuario');
		
		if ($this->Modelo_Usuario->validar_existe_correo($this->input->post('correo'))!=null) {
			echo "El correo ya existe";die();
		}elseif ($this->Modelo_Usuario->validar_existe_rut($this->input->post('rut'))!=null){
			echo "El rut ya existe";die();
		}else{
			$verificar=0;
			$this->session->unset_userdata('error');
			$this->session->unset_userdata('exito');
			if (!validar($this->input->post('rut'),"rut")) {
				$verificar++;
			}
			if (!validar($this->input->post('nombre'),"text")) {
				$verificar++;		
			}
			if (!validar($this->input->post('correo'),"email")) {
				$verificar++;		
			}

			if($verificar!=0){
				$this->session->set_userdata('error',"Se encontraron errores en el formulario");
				redirect('index.php/auth/registro','refresh');
			}
			
		}
		$this->load->model('Modelo_Usuario');
		$uuid=$this->Modelo_Usuario->token();
				//VALIDAR SI EXÍSTE EMAIL!!!
		$usuario=[
			"uuid"=>$uuid,
			"rut"=>$this->input->post('rut'),
			"nombre"=>$this->input->post('nombre'),
			"correo"=>$this->input->post('correo'),
			"contrasena"=>sha1($this->input->post('contrasena')),
			"fecha_creacion"=>date("Y-m-d H:i:s"),
			"status"=>false,
			"perfil_uuid"=>$this->input->post('perfil'),
			
		];
		$this->Modelo_Usuario->add_usuario($usuario);
		$token=$this->Modelo_Usuario->token();
		$activacion=[
			"token"=>$token,
			"fecha_creacion"=>date("Y-m-d H:i:s"),
			"status"=>true,
			"usuario_uuid"=>$uuid

		];
		$this->Modelo_Usuario->add_activacion($activacion);
				//GUARDAR $ACTIVACIÓN EN MODELO
		sendmail("Estimad@ ".$this->input->post('nombre').", para ingresar a contapp debe activar su cuenta haciendo click en el botón de más abajo. Si el botón no funciona copie y pegue el siguiente enlace en su navegador.",$this->input->post('correo'),"Activa tu cuenta",base_url()."auth/activar_cuenta/".$token);
		$this->session->set_userdata('exito',"Las instrucciones para activar su cuenta han sido enviadas a su correo electrónico");


		redirect('index.php/auth/login','refresh');

	}

	public function activar_cuenta($token){

	   //recibimos el token
		//vamos a buscar la id del token con traer_uuid

		//if el resultado es nullo, el token es inválido y termina el flujo

		//de lo contrario hay que activar al usuario con activar_cuenta

		//luego hay que inhabilitar el token con la función invalidar_token(al actualizarse la fecha de uso, la uuid del token queda invalido)

		//finalmente hay que redirigir a la página de login y enviar un mensaje de éxito.

		echo $token;
	}

	public function token()
	{
		$this->load->model('Modelo_Usuario');
		echo $this->Modelo_Usuario->token();
	}


	public function validar_datos_registros(){

		if($this->Modelo_Usuario->guardar($data)){
			redirect("index.php/auth/registro","refresh");
		}else{
			$this->session->set_flashdata('error', 'no se ha podido guardar el registro');
			redirect("index.php/auth/add_usuario","refresh");
		}


	}



}


