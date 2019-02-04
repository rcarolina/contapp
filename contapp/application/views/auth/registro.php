<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Webapp CONTAPP">
    <meta name="author" content="SAARGO">
    <title>CONTAPP - Registro</title>

    <?php
        $this->load->view('comun/css');     
    ?>

  </head>

  <body class="register bg-dark">
	  
	  
	 <div class="container">
	    
	    <div class="register-module-info">
		    <div class="info-wrap">
			    <img class="brand" src="<?=base_url()?>assets/img/contapp-brand.svg" alt="Logo Contapp">
			    <h4>Haz tu contabilidad de forma rápida y simple</h4>
		    </div>
	    </div>
	    
	    <div class="login-module form-module">
		    <h3>Registro</h3>
		    <p>Regístrate rellenando los datos a continuación</p>
		    <?php
                if($this->session->userdata('error')!=null){
                    echo '<h5 style="color:red;">Se han encontrado errores en el formulario</h5>';
                }
            ?>
            <form method="post" action="<?=base_url()?>index.php/auth/add_usuario">
	            
	            <div class="form-group"><input type="text" class="form-control" oninput="checkRut(this)" name="rut" placeholder="RUT" required="required"></div>
	            <div class="form-group"><input type="text" class="form-control" name="nombre" required="required" placeholder="Nombre"></div>
	            <div class="form-group"><input type="email" class="form-control" name="correo" placeholder="Correo Electrónico" required="required"></div>
	            <div class="form-group"><input type="password" class="form-control" name="contrasena" required="required" placeholder="Contraseña"></div>
	            <div class="form-group"><button type="submit" class="btn btn-gradient-principal btn-block">Registrarme</button></div>
            </form>
            <div class="action-module">
	            <p>¿Ya tienes una cuenta? <a href="<?=base_url()?>index.php/auth/login">Iniciar sesión</a></p>
	            <a href="#">¿Olvidaste tu Contraseña?</a>
	    	</div> 
	    </div>

	 </div><!-- /.container --> 

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




