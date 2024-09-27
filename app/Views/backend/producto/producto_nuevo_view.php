
    <div>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="mt-3 mb-3 ms-3 me-3 h4 text-center alert alert-success alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="container mt-5">
        <h1>CRUD Productos</h1>
        <div class="d-flex justify-content-end">
            <a href="<?= site_url('/produ-form') ?>" class="btn btn-success btn-sm mt-1">Agregar</a>
            <a href="<?= site_url('/eliminados') ?>" class="btn btn-danger btn-sm mt-1">Eliminados</a>
        </div>
        <div class="mt-3">
            <div class="table-responsive">
                <table class="table table-success table-striped" id="users-list">
                    <thead>
                        <tr>
                            <!--th>Id</th-->
                            <th>Categoria</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Precio Venta</th>
                            <th>Stock</th>
                            <th>Imagen</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($productos): ?>
                            <?php foreach ($productos as $prod){ ?>
                              <?php $eliminado = $prod['eliminado']; ?>
                                <?php if ($eliminado == 'NO'):?>
                                    <tr>
                                        <!--td><?= $prod['id']; ?></td-->
                                        <td><?= $prod['descripcion']; ?></td>
                                        <td><?= $prod['nombre_prod']; ?></td>
                                        <td><?= $prod['precio']; ?></td>
                                        <td><?= $prod['precio_vta']; ?></td>
                                        <td><?= $prod['stock']; ?></td>
                                        <td>
                                            <img height="70px" width="85px" src="<?= base_url() ?>/assets/uploads/<?= $prod['imagen']; ?>"></td>
                                        <td>
                                            <a href="<?php echo base_url('/editar' . $prod['id']) ;?>" class="btn btn-primary btn-sm mt-1">Editar</a>
                                            <a href="<?php echo base_url('borrar/' . $prod['id']) ; ?>" class="btn btn-secondary btn-sm mt-1">Borrar</a>
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
