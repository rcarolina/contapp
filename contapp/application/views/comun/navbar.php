<nav class="navbar navbar-expand navbar-dark bg-gradient-principal static-top">

      <a class="navbar-brand mr-1" href="index.html"><img src="img/contapp-logo.svg" alt="Contapp"></a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
	      <li class="wallet-module">
	      	<!--<i class="fas fa-wallet"></i>-->
	      	<div class="wallet-data">
	      		<h3>Saldo: <span class="balance">$78.900</span></h2>
	      		<span class="uf">Valor UF: $28.000</span>
	      	</div>
	      </li>
		  <li class="recharge-module"><button type="button" class="btn btn-wallet">Recargar Billetera</button></li>
		  <li class="user-module nav-item dropdown no-arrow">
          	<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            	 <?=$this->session->userdata('usuario')["nombre"]?>
          	</a>
		  	<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            	<a class="dropdown-item" href="#">Perfil</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="<?=base_url()?>index.php/auth/logout">Salir</a>
          	</div>
		  </li>
      </ul>

    </nav>