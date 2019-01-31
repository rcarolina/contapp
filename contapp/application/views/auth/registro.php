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
                            echo '<h3 style="color:red;">Se han encontrado errores en el formulario</h3>';
                        }
                    ?>

                    <form method="post" action="<?=base_url()?>index.php/auth/add_usuario">
                        <div class="col-lg-6 offset-lg-3">
                        <div class="col-lg-12">
                            <div class="form-group">
                                    
                            <label for="rut">Rut</label>
                            <input type="text" class="form-control" oninput="checkRut(this)" name="rut" required="required">
                            
                            </div>
                    
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="form-group">
                                    
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" required="required">
                            
                            </div>
                    
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="form-group">
                                    
                            <label for="correo">Correo</label>
                            <input type="email" class="form-control" name="correo" required="required">
                            
                            
                            </div>
                    
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                    
                            <label for="contrasena">Contraseña</label>
                            <input type="password" class="form-control" name="contrasena" required="required">
                
                            
                            </div>
                    
                        </div>
                            
                        <div class="col-lg-12 text-center">
                        
                         <button type="submit" class="btn btn-success" style="width: 100% !important;">Registrarme</button>

                        </div>
                        <div class="col-lg-12 text-center">
                         <br>
                         <a href="<?=base_url()?>index.php/auth/login" class="btn btn-info" style="width: 100% !important;"><- Volver</a>

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
    <script type="text/javascript">
		function checkRut(rut) {
    // Despejar Puntos
    var valor = rut.value.replace('.','');
    // Despejar Guión
    valor = valor.replace('-','');
    
    // Aislar Cuerpo y Dígito Verificador
    cuerpo = valor.slice(0,-1);
    dv = valor.slice(-1).toUpperCase();
    
    // Formatear RUN
    rut.value = cuerpo + '-'+ dv
    
    // Si no cumple con el mínimo ej. (n.nnn.nnn)
    if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}
    
    // Calcular Dígito Verificador
    suma = 0;
    multiplo = 2;
    
    // Para cada dígito del Cuerpo
    for(i=1;i<=cuerpo.length;i++) {
    
        // Obtener su Producto con el Múltiplo Correspondiente
        index = multiplo * valor.charAt(cuerpo.length - i);
        
        // Sumar al Contador General
        suma = suma + index;
        
        // Consolidar Múltiplo dentro del rango [2,7]
        if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
  
    }
    
    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);
    
    // Casos Especiales (0 y K)
    dv = (dv == 'K')?10:dv;
    dv = (dv == 0)?11:dv;
    
    // Validar que el Cuerpo coincide con su Dígito Verificador
    if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }
    
    // Si todo sale bien, eliminar errores (decretar que es válido)
    rut.setCustomValidity('');
}
	</script>
  </body>

</html>




