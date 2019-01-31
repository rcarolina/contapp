<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portal extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('utils');
		$this->load->model('Modelo_Usuario');
		//$this->output->enable_profiler(true);
		$this->load->library('google');
		$this->load->library('session');
		 
        date_default_timezone_set("Chile/Continental");
	}
	

    public function home(){
        is_login();
        $this->load->view('home');
    }




}


