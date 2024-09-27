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
        <h1>CRUD Consultas</h1>
        <div class="d-flex justify-content-end">
           
            <a href="<?= site_url('/con_respondidas') ?>" class="btn btn-danger btn-sm mt-1">Ver Consultas Respondidas</a>
        </div>
        <div class="mt-3">
            <div class="table-responsive">
                <table class="table table-success table-striped" id="users-list">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>E-Mail</th>
                            <th>Telefono</th>
                            <th>Mensaje      </th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($consultas): ?>
                            <?php foreach ($consultas as $con){ ?>
                              <?php $respondida = $con['respondida']; ?>
                                <?php if ($respondida == 'NO'): ?>
                                    <tr>
                                        <td><?= $con['id_consulta']; ?></td>
                                        <td><?= $con['consulta_nombre']; ?></td>
                                        <td><?= $con['consulta_apellido']; ?></td>
                                        <td><?= $con['consulta_email']; ?></td>
                                        <td><?= $con['consulta_telefono']; ?></td>
                                        <td><?= $con['consulta_mensaje']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('/atender' . $con['id_consulta']) ;?>" class="btn btn-primary btn-sm mt-1">Atender</a>
                                            
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
