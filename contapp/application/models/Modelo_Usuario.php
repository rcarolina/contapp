<?php
class Modelo_Usuario extends CI_Model {
	public function __construct()
	{
		parent::__construct();           
	}

	public function add_usuario($usuario){  
		$this->db->insert('usuario', $usuario);

	}

	public function activar_cuenta($uuid){
		$this->db->where('uuid', $uuid);
		$this->db->update('usuario', ["status"=>true]);
	}

	public function search_user($oauth_id){
		$this->db->select('*');
		$this->db->where('oauth_uuid', $oauth_id);
		return $this->db->get('usuario')->row_array();
	}


/*
	   	public function desactivar_cuenta($uuid){
         	$this->db->where('uuid', $uuid);
         	$this->db->update('usuario', ["status"=>false]);
	   	 }

*/

	   	 public function invalidar_token($token){
	   	 	$this->db->where('token', $token);
	   	 	$this->db->update('activacion', ["fecha_uso"=>date("Y-m-d H:i:s"),"status"=>false]);

	   	 }


	   	 public function traer_uuid($token){
	   	 	$this->db->select('usuario_uuid as "UUID"');
	   	 	$this->db->where('token', $token);
	   	 	$this->db->where('status', true);
	   	 	return $this->db->get('activacion')->row_array();
	   	 	

	   	 }

	   	 public function add_activacion($activacion){  
	   	 	$this->db->insert('activacion', $activacion);

	   	 }

	   	 public function token(){
	   	 	$query=$this->db->query('select gen_random_uuid() as "token"');
	   	 	$q=$query->row_array();
	   	 	return $q["token"];

	   	 }


	   	 public function existe_usuario($correo, $contrasena){

	   	 	$this->db->where('usuario.correo', $correo);
	   	 	$this->db->where('usuario.contrasena', sha1($contrasena));
	   	 	return $this->db->get('usuario')->row_array();


	   	 }


	   	 public function validar_existe_correo($correo)
	   	 {
	   	 	$this->db->select('*');
	   	 	$this->db->where('correo', $correo);
	   	 	return $this->db->get('usuario')->row_array();
	   	 }


	   	 public function validar_existe_rut($rut)
	   	 {
	   	 	$this->db->select('*');
	   	 	$this->db->where('rut', $rut);
	   	 	return $this->db->get('usuario')->row_array();
	   	 }


	   	 public function validar_login($correo,$contrasena)
        {
               $this->db->select('*');
               $this->db->where('correo', $correo);
               $this->db->where('contrasena', sha1($contrasena));
               $this->db->where('status', true);
               //$this->db->where('OAUTH_UID', "0");
               return $this->db->get('usuario')->row_array();
        }


	   	}
	?>