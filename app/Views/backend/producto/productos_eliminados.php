
<div>
    <!-- recuperamos datos con la funcion Flashdata para mostrarlos en la vista -->
    <?php if (session()->getFlashdata('success')){
        echo "
        <div class='mt-3 mb-3 ms-3 h4 text-center alert alert-success alert-dismissible'>
        <buttom type-'buttom' class='btn-close' data-bs-dismiss='alert'></buttom>" . session()->getFlashdata('success') . "
        </div>";
    } ?>
</div>
<div class="container mt-5">
    <h1>Productos Eliminados</h1>
 
    <div class="mt-3">
        <div class="table-responsive">
            <table class="table table-success table-striped" id="users-list">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Precio Venta</th>
                        <th>Stock</th>
                        <th>Imagen</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($productos): ?>
                        <?php foreach($productos as $prod): ?>
                            <?php $eliminado = $prod['eliminado']; ?>
                            <?php if ($eliminado == 'SI'): ?>
                                <tr>
                                    <td><?php echo $prod['id']; ?></td>
                                    <td><?php echo $prod['nombre_prod']; ?></td>
                                    <td><?php echo $prod['precio']; ?></td>
                                    <td><?php echo $prod['precio_vta']; ?></td>
                                    <td><?php echo $prod['stock']; ?></td>
                                        <?php $imagen = $prod ['imagen']; ?>
                                        <?php $id = $prod['id']; ?>

                                    <td> <img height="70px" width="85px" src="<?=base_url()?>/assets/uploads/<?=$imagen?>"> </td>
                                    <td>
                                        <a href="<?php echo base_url('/activar_pro/' .$id);?>" class="btn btn-secondary btn-sm mt-1">Activar</a>
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