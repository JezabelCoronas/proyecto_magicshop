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
        <h1>CRUD Usuarios</h1>
        <div class="d-flex justify-content-end">
         <a href="<?= site_url('/us_eliminados') ?>" class="btn btn-danger btn-sm mt-1">Ver Eliminados</a>
        </div>
        <div class="mt-3">
            <div class="table-responsive">
                <table class="table table-success table-striped" id="users-list">
                    <thead>
                        <tr>
                            <!--th>Id</th--> 
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo Electrónico</th>
                            <th>Nombre de usuario</th>
                            <th>Tipo</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                <tbody class="table-group-divider">
                        <?php if ($usuarios): ?>
                            <?php foreach ($usuarios as $user){ ?>
                              <?php $baja = $user['baja']; ?>
                                <?php if ($baja == 'NO'): ?>
                                    <tr>
                                       <?php $id= $user['id_usuario']; ?>
                                        <td><?= $user['nombre']; ?></td>
                                        <td><?= $user['apellido']; ?></td>
                                        <td><?= $user['email']; ?></td>
                                        <td><?= $user['usuario']; ?></td>
                                        <td><?= $user['perfil_id']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('us_editar/'. $id) ;?>" class="btn btn-primary btn-sm mt-1">Editar</a>
                                            <a href="<?php echo base_url('us_borrar/' . $id) ; ?>" class="btn btn-secondary btn-sm mt-1">Borrar</a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php }?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  <hr class="hr" />
</body>
</html>
