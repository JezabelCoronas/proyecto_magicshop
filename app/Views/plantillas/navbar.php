 <!-- Barra de navegación-->
<body>
 <div class = "container-fluid">
  <nav class = "navbar navbar-expand-lg navbar-light bg-light">
     <div class = "container- fluid">
            <a href= "<?php echo base_url('plantilla_home'); ?>" class= "navbar-brand">MAGIC SHOP</a>
              <button type= "button" class = "navbar-toggler" data-bs-toggle ="collapse" data-bs-target= "#MenuNavegacion">
                <span class = "navbar-toggler-icon"> </span>
             </button>
          </div>

    <!--NAVBAR PARA PERFIL DE ADMINISTRADOR-->
                
                     <?php if(session()->perfil_id== 1){ ?>

                <div id="MenuNavegacion" class="collapse navbar-collapse">

                <ul class="navbar-nav ms-3">
                  <li class= "nav-item">
                        <a class="nav-link carrois-gothic-regular" href="#"> Bienvenido/a ADMIN:</a>
                        </li>
                         <li class= "nav-item">
                        <a class="nav_link carrois-gothic-regular" href="#"><?php echo session('nombre'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link carrois-gothic-regular" href="<?php echo base_url('ver_consultas'); ?>">CRUD CONSULTAS</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link carrois-gothic-regular" href="<?php echo base_url('crear'); ?>">CRUD PRODUCTOS</a>
                    </li>                    
                    <li class="nav-item">
                        <a class="nav-link carrois-gothic-regular" href="<?php echo base_url('ventas'); ?>">VENTAS</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link carrois-gothic-regular" href="<?php echo base_url('usuario_logueado'); ?>">CRUD USUARIOS</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link carrois-gothic-regular" href="<?php echo base_url('logout'); ?>">LOGOUT</a>
                    </li>
                  </ul>
              </div>

                 <!--NAVBAR PARA PERFIL DE CLIENTE-->

                <?php }elseif(session()->perfil_id == 2){ ?>
                <div id="MenuNavegacion" class="collapse navbar-collapse">

                    <ul class="navbar-nav ms-3">

                      <li class= "nav-item">
                        <a class="nav-link carrois-gothic-regular" href="#"> Bienvenido/a CLIENTE:</a>
                        </li>
                        <li class= "nav-item">
                        <a class="nav_link carrois-gothic-regular" href="#"><?php echo session('nombre'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link carrois-gothic-regular" href="<?php echo base_url('quienes_somos'); ?>"> QUIÉNES SOMOS </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link carrois-gothic-regular" href="<?php echo base_url('todos_p'); ?>"> CATÁLOGO </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link carrois-gothic-regular" href="<?php echo base_url('contacto'); ?>"> CONTACTO </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link carrois-gothic-regular" href="<?php echo base_url('terminos_usos'); ?>"> TÉRMINOS Y USOS </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link carrois-gothic-regular" href="<?php echo base_url('/mis_compras'); ?>"> MIS COMPRAS </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link carrois-gothic-regular" href="<?php echo base_url('muestro'); ?>">VER CARRITO</a>
                        </li>
                        
                        <li class= "nav-item">
                        <a class="nav-link carrois-gothic-regular" href="<?php echo base_url('logout')?>"> LOGOUT </a>
                        </li>
                      </ul>
                  </div>

                <?php } else { ?>

                    <!--NAVBAR PARA PERFIL DE INVITADO-->
         
         <div id="MenuNavegacion" class="collapse navbar-collapse">
				      <ul class="navbar-nav ms-3">
					    <li class="nav-item">
                  <a class="nav-link carrois-gothic-regular" href="<?php echo base_url('quienes_somos'); ?>">QUIÉNES SOMOS</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link carrois-gothic-regular" href="<?php echo base_url('comercializacion'); ?>">COMERCIALIZACIÓN</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link carrois-gothic-regular" href="<?php echo base_url('contacto'); ?>">CONTACTO</a>
              </li>
               <li class="nav-item">
                 <a class="nav-link carrois-gothic-regular" href="<?php echo base_url('productos'); ?>">PRODUCTOS</a>
                </li>
              <li class="nav-item">
                  <a class="nav-link carrois-gothic-regular" href="<?php echo base_url('terminos_usos'); ?>">TÉRMINOS Y USOS</a>
              </li>  
              <li class="nav-item">
                  <a class="nav-link carrois-gothic-regular" href="<?php echo base_url('login'); ?>">INICIAR SESIÓN</a>
              </li>  
              <li class="nav-item">
                  <a class="nav-link carrois-gothic-regular" href="<?php echo base_url('registro'); ?>">REGISTRAR</a>
              </li>  

               <?php }?>
                </ul>
                </div>
                </div>
                </div>

                <?php if (session()->getFlashdata('msg')): ?>
                         <div class="custom-alert h6 text-center alert alert-warning alert-dismissible">
                         <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <?= session()->getFlashdata('msg') ?>
                </div>
    <?php endif  ?>
        </nav> 
			  </div>

      </body>
      </html>