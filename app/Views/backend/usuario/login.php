
 <div class="container mt-5 mb-5 d-flex justify-content-center">

  <div class="card" style="width: 50%;">
    <div class="card-header text-center carrois-gothic-regular">
      <h2>Iniciar sesión</h2>
    </div>
     <!-- Mensaje de Error -->
        <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-warning">
                          <?= session()->getFlashdata('msg')?>
                    </div>
         <?php endif;?>     
      <!-- Incio del formulario de login-->              
    <form method="post" action="<?php echo base_url('/enviarLogin') ?>">
      <div class="card-body" media="(max-width:768px)">
        
        <div class="col-12 mb-2">
          <label for="exampleFormControlInput1" class="form-label">Nombre de usuario</label>
          <input name="usuario" type="text" class="form-control"  placeholder="Ingrese nombre de usuario" >
         </div>
        
        <div class="col-12 mb-2">
          <label for="exampleFormControlInput1" class="form-label">Password</label>
          <input name="pass" type="password"  class="form-control" placeholder="Contraseña">
        </div>
        
        <input type="submit" value="Ingresar" class="btn btn-success">
        <a href="<?php echo base_url('login'); ?>" class="btn btn-danger">Cancelar</a>
        <br>
        <span>¿Aún no se registró? <a href="<?php echo base_url('/registro'); ?>">Registrarse aquí</a></span>
      </div>
    </form>
  </div>
</div>
  </body>
     <hr class="hr" />
</html>