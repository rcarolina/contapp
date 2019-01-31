<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Webapp CONTAPP">
    <meta name="author" content="SAARGO">
    <title>CONTAPP</title>

    <?php
        $this->load->view('comun/css');     
    ?>

  </head>

  <body id="page-top">

   

    <div id="wrapper">

      
      <div id="content-wrapper">

              <div class="container">
			  <?php
						if($this->session->userdata('error')!=null){
							echo '<h1 style="color:red;">'.$this->session->userdata('error').'</h1>';
							$this->session->unset_userdata('error');
						}
					?>
					<form  method="post" action="<?=base_url()?>auth/iniciar_session">
					
						<div class="col-lg-4 offset-lg-4">
						<div class="col-lg-12">
							<div class="form-group">
									
							<label for="correo">Correo</label>
							<input type="email" name="correo" class="form-control" required="required">
							
							</div>
					
						</div>
						<div class="col-lg-12">
							<div class="form-group">
									
							<label for="contrasena">Contraseña</label>
							<input type="password" name="contrasena" class="form-control" required="required">
							
							</div>
					
						</div>

						<div class="col-lg-12">
							<div class="form-group">
									<a href="<?=$url?>" class="btn btn-danger" style="width: 100% !important;">
									<i class="fab fa-google-plus-g" style="font-size:19px;"></i> <strong>Ingresar con Google</strong>
									</a>
							</div>
					    </div>
							
						<div class="col-lg-12 text-center">
						
						<button type="submit" class="btn btn-success" style="width: 100% !important;">Iniciar Sesión</button>
						</div>
						<div class="col-lg-12 text-center">
							<br>
						<a href="<?=base_url()?>index.php/auth/registro" class="btn btn-info" style="width: 100% !important;">Registrarse</a>
						</div>
						</div>
					</form>
			  </div>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>


    <?php
        $this->load->view('comun/js');     
    ?>
  </body>

</html>

