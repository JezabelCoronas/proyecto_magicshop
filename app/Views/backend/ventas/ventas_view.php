<!--Esta es una vista para el administrador, podrá ver las compras de todos los usuarios 
    con detalles según ID de cada compra-->
<div class="container mt-5">
    <h1>Ventas Registradas</h1>
    <div class="row mt-3">
        <?php if (!empty($ventas) && is_array($ventas)): ?>
            <?php foreach ($ventas as $venta): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Venta ID: <?= esc($venta['id']) ?></h5>
                            <p class="card-text">Fecha: <?= esc($venta['fecha']) ?></p>
                            <p class="card-text">Usuario ID: <?= esc($venta['usuario_id']) ?></p>
                            <p class="card-text">Total Venta: <?= esc($venta['total_venta']) ?></p>

                            <h6 class="card-subtitle mt-3 mb-2">Detalles de la Venta:</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>ID</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($venta['detalles']) && is_array($venta['detalles'])): ?>
                                        <?php foreach ($venta['detalles'] as $detalle): ?>
                                            <?php foreach ($productos as $prod): ?>
                                                <?php if ($detalle['producto_id'] == $prod['id']) : ?>
                                                    <tr>
                                                        <td><img height="70px" width="85px" src="<?= base_url() ?>/assets/uploads/<?= $prod['imagen']; ?>"></td>
                                                        <td><?= esc($detalle['producto_id']) ?></td>
                                                        <td><?= esc($detalle['cantidad']) ?></td>
                                                        <td><?= esc($detalle['precio']) ?></td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="3">No hay detalles para esta venta.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-md-12">
                <p>No hay ventas registradas.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
<hr class="hr" />
