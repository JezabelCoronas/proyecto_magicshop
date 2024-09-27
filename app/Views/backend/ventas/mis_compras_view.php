<div class="container mt-5">
    <h1>Mis Compras</h1>
    <?php if (!empty($ventas)): ?>
        <table class="table table-hover table-striped">
            <thead>
                <tr class="table-primary">
                    <th scope="col">ID Venta</th>
                    <th scope="col">Fecha de la compra</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ventas as $venta): ?>
                    <tr>
                        <td><?= $venta['id'] ?></td>
                        <td><?= $venta['fecha'] ?></td>
                        <td>$<?= number_format($venta['total_venta'], 2, '.', ',') ?></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Producto</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($productos as $prod): ?>
                                    <?php foreach ($venta['detalles'] as $detalle): 
                                        
                                            if ($detalle['producto_id'] == $prod['id']) :
                                                $nombre=$prod['nombre_prod']; ?>
                                        <td>
                                     
                                        <tr>
                                            <td>
                                      <img height="70px" width="85px" src="<?= base_url() ?>/assets/uploads/<?= $prod['imagen']; ?>">
                                  <?= $prod['nombre_prod']; ?></td>
                                            <td><?= $detalle['cantidad'] ?></td>
                                            <td>$<?= number_format($detalle['precio'], 2, '.', ',') ?></td>
                                            <td>$<?= number_format($detalle['cantidad'] * $detalle['precio'], 2, '.', ',') ?></td>
                                        </tr>
                                          <?php  endif; ?>
                                    <?php endforeach; ?>
                               
                                <?php endforeach; ?>
     
                                </tbody>
                            </table>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay ventas registradas para este usuario.</p>
    <?php endif; ?>
</div>
