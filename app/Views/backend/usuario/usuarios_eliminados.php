<div>
    <?php if (session()->getFlashdata('success')): ?>
        <div class="mt-3 mb-3 ms-3 me-3 h4 text-center alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="mt-3 mb-3 ms-3 me-3 h4 text-center alert alert-danger alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
</div>

    <div class="container mt-5">
        <h1>Usuarios Eliminados</h1>
        
        <div class="mt-3">
            <div class="table-responsive">
                <table class="table table-success table-striped" id="users-list">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo Electrónico</th>
                            <th>Nombre de usuario</th>
                            <th>Tipo</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($usuarios): ?>
                            <?php foreach($usuarios as $user): ?>
                              <?php $baja = $user['baja']; ?>
                                <?php if($baja == 'SI'): ?>
                                    <tr>
                                        <td><?php echo $id= $user['id_usuario'];?></td>
                                        <td><?php echo $user['nombre']; ?></td>
                                        <td><?php echo $user['apellido']; ?></td>
                                        <td><?php echo $user['email']; ?></td>
                                        <td><?php echo $user['usuario']; ?></td>
                                        <td><?php echo $user['perfil_id']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('us_activar/'.$id) ;?>" class="btn btn-primary btn-sm mt-1">Activar</a> 
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
         <hr class="hr" />
</body>
</html>