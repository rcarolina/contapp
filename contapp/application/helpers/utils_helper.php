<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
    function sendmail($mensaje,$para,$boton,$url){
        $CI =& get_instance();       
        $config=[
        'protocol' => 'smtp',
        'smtp_host' => "ssl://smtp.gmail.com",
        'smtp_port' => "465",
        'smtp_user' => "contapp105@gmail.com",
        'smtp_pass' => "contapp2018",
        'mailtype'  => 'html', 
        'wordwrap'=> TRUE,
        'charset'   => 'utf-8'
        ];
        
        
        $CI->load->library('email',$config);
        $CI->email->set_newline("\r\n");
        $CI->email->set_mailtype("html");
    
        $data["mensaje"]=$mensaje;
        $data["boton"]=$boton;
        $data["url"]=$url;

        $template=$CI->load->view('comun/email',$data,TRUE);
        $CI->email->from('contapp105@gmail.com', 'contapp');
        $CI->email->subject('CONTAPP'); 
        $CI->email->to($para); 
        //$CI->email->message($html);  
        $CI->email->message($template); 
        $CI->email->send();
    }

    function validar($campo=null,$tipo=null){
        if($campo==null || $tipo==null){
            return false;
        }
        switch ($tipo) {
            case 'email':
                if (!filter_var($campo, FILTER_VALIDATE_EMAIL)) {
                    return false;
                }
                return true;
            break;

            case 'text':
                if(is_numeric($campo)) {
                    return false;
                }
                return true;
            break;
            
            case 'number':
                if(!is_numeric($campo)) {
                    return false;
                }
                return true;
            break;

            case 'rut':
                if($tipo!=null){
                    return true;
                }else{
                    return false;
                }
            break;

            default:
                return false;
            break;
        }
    }


  /*function is_logued(){
        $CI =& get_instance();
        $CI->load->library('session');
        if ($CI->session->userdata('usuario')["UUID"]!=null ) {
            
                $retorno=[
                "status"=>TRUE,
                "perfil_uuid"=>$CI->session->userdata('usuario')["perfil_uuid"]
                ];
                //return $retorno;
                return true;
            
        }else{
            $retorno=[
                "status"=>FALSE
            ];
            //return $retorno;
            return false;
        }
    }

    function perfil(){
        $CI =& get_instance();
        $CI->load->library('session');
        if ($CI->session->userdata('usuario')["UUID"]!=null ) {
            
                $retorno=[
                "status"=>TRUE,
                "perfil_uuid"=>$CI->session->userdata('usuario')["perfil_uuid"]
                ];
                return $retorno;
            
            
        }else{
            $retorno=[
                "status"=>FALSE
            ];
            return $retorno;
        }
    }*/

?>