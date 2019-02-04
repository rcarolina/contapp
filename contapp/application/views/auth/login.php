<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Webapp CONTAPP">
    <meta name="author" content="SAARGO">
    <title>CONTAPP - Login</title>

    <?php
        $this->load->view('comun/css');     
    ?>

  </head>

  <body class="login bg-dark">
	  
	  
	  <div class="container">
	    
	    <div class="register-module-info">
		    <div class="info-wrap">
			    <img class="brand" src="<?=base_url()?>assets/img/contapp-brand.svg" alt="Logo Contapp">
			    <h4>Te puedes registrar de forma totalmente</h4>
			    <h3>Gratis</h3>
			    <a href="<?=base_url()?>index.php/auth/registro" class="btn btn-register btn-lg">Crea tu Cuenta</a>
		    </div>
	    </div>
	    
	    <div class="login-module form-module">
		    <h3>Iniciar sesión</h3>
		    <p>Introduzca sus credenciales para iniciar sesión</p>
		    <?php
				if($this->session->userdata('error')!=null){
					echo '<h5 style="color:red;">'.$this->session->userdata('error').'</h5>';
					$this->session->unset_userdata('error');
				}
			?>
		    <form  method="post" action="<?=base_url()?>index.php/auth/iniciar_session">
	            <div class="form-group"><input type="email" id="inputEmail" class="form-control" placeholder="Correo Electrónico" required="required" autofocus="autofocus"></div>
	            <div class="form-group"><input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required="required"></div>
	            <div class="form-group">
		            <div class="checkbox">
	                	<label>
							<input type="checkbox" value="remember-me">
							Recordar Contraseña
						</label>
	              	</div>
	            </div>
	            <div class="form-group"><button type="submit" class="btn btn-gradient-principal btn-block" href="#">Iniciar Sesión</button></div>
	            <div class="form-group">
					<a href="<?=$url?>" class="btn btn-google btn-danger">
						<i class="fab fa-google-plus-g"></i> <strong>Ingresar con Google</strong>
					</a>
				</div>
          	</form>
	        <div class="action-module">
	            <p>¿Aún no tienes una cuenta? <a href="<?=base_url()?>index.php/auth/registro">Registrarse</a></p>
	            <a href="#">¿Olvidaste tu Contraseña?</a>
	    	</div>
	    </div>

    </div><!-- /.container -->

    <?php
        $this->load->view('comun/js');     
    ?>
  </body>

</html>

