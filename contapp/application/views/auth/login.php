<?php
?>
<!DOCTYPE>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<?php
		if($this->session->userdata('error')!=null){
			echo '<h1 style="color:red;">'.$this->session->userdata('error').'</h1>';
			$this->session->unset_userdata('error');
		}
	?>
	<form  method="post" action="<?=base_url()?>auth/iniciar_session">
      
	    
	    <div class="col-lg-3">
	    	 <div class="form-group">
	    		  	
	    	 <label for="correo">Correo</label>
               <input type="email" name="correo" required="required">
	    	
	    	</div>
	  
	    </div>
	    <div class="col-lg-3">
	    	 <div class="form-group">
	    		  	
	    	 <label for="contrasena">Contraseña</label>
               <input type="password" name="contrasena" required="required">
	    	
	    	</div>
	  
	    </div>

	     <div class="form-group">
                <a href="<?=$url?>" class="btn btn-danger" style="width: 100% !important;">
                  <i class="fab fa-google-plus-g" style="font-size:19px;"></i> <strong>Ingresar con Google</strong>
                </a>
           </div>
	           
	    <div class="col-lg-12 text-center">
           
           <button type="submit" class="btn btn-success btn-lg">Iniciar Sessión</button>
        </div>
	</form>
</body>
</html>