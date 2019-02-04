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

  <body class="login recover bg-dark">
	  
	  
	  <div class="container">
	    
	    <div class="register-module-info">
		    <div class="info-wrap">
			    <img class="brand" src="<?=base_url()?>assets/img/contapp-brand.svg" alt="Logo Contapp">
			    <h4>Haz tu contabilidad de forma rápida y simple</h4>
		    </div>
	    </div>
	    
	    <div class="login-module form-module">
		    <h3>Recuperar contraseña</h3>
		    <p>Ingresa tu correo electrónico y te enviaremos las instrucciones para recuperar tu contraseña</p>
		    <?php
				if($this->session->userdata('error')!=null){
					echo '<h5 style="color:red;">'.$this->session->userdata('error').'</h5>';
					$this->session->unset_userdata('error');
				}
			?>
		    <form>
	            <div class="form-group"><input type="email" id="inputEmail" class="form-control" placeholder="Correo Electrónico" required="required" autofocus="autofocus"></div>
	            <div class="form-group"><button type="submit" class="btn btn-gradient-principal btn-block" href="#">Recuperar contraseña</button></div>
          	</form>
	    </div>

      </div><!-- /.container -->

    <?php
        $this->load->view('comun/js');     
    ?>
  </body>

</html>

	