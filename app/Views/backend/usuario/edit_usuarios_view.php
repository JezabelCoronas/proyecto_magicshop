<div class="container mt-2 mb-5 d-flex justify-content-center">
    <div class="card" style="width: 50%;">
        <div class="card-header text-center">
            <h2>Editar Usuarios</h2>
                <div class="container mt-2 mb-5 d-flex justify-content-center">

        <?php $validation = \Config\Services::validation(); ?>

        <form method="post" action="<?php echo base_url('us_modifica/'.$usuario['id_usuario'])?>" enctype="multipart/form-data">
            <?php if(!empty(session()->getFlashdata('fail'))): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
            <?php endif ?>
            <?php if(!empty(session()->getFlashdata('success'))): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
            <?php endif ?>       
            <div class="card-body justify-content-center" media="(max-width:768px)">
                <div class="form-group">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input name="nombre" type="text" class="form-control" placeholder="Ingrese nombre:" value="<?= $usuario['nombre'] ?>" readonly>
                    <?php if($validation->getError('nombre')): ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $validation->getError('nombre'); ?>
                        </div>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input name="apellido" type="text" class="form-control" placeholder="Ingrese apellido:" value="<?= $usuario['apellido'] ?>" readonly>
                    <?php if($validation->getError('apellido')): ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $validation->getError('apellido'); ?>
                        </div>
                    <?php endif ?>
                </div>
                   
                   <div class="form-group">
                    <label>usuario</label>
                    <input type="text" name="usuario" class="form-control" value="<?php echo $usuario['usuario']; ?>" readonly>
                  </div>
                   <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $usuario['email']; ?>" readonly>
                  </div>
                   <div class="form-group">
                    <label>Perfil_id</label>
                    <input type="text" name="perfil" class="form-control" value="<?php echo $usuario['perfil_id'];?>" autofocus>
                  </div>
                    
              </div>
            </div>
            <input type="submit" value="Enviar" class="btn btn-success">
            <a href="<?php echo base_url('usuario_logueado'); ?>" class="btn btn-danger">Cancelar</a>
            <input type="reset" value="Borrar" class="btn btn-secondary">
          </div>
        </form>       
    </div>
  </div>
 </body>
<hr class="hr" />

</html>