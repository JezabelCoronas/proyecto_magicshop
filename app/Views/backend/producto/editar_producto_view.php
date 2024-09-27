<div class="container mt-2 mb-5 d-flex justify-content-center">
    <div class="card" style="width: 50%;">
        <div class="card-header text-center">
            <h2>Editar Producto</h2>
        </div>

        <?php $validation = \Config\Services::validation(); ?>

       <form action="<?php echo base_url('modifica/'.$producto['id']);?>" method="post" enctype="multipart/form-data">
            <?php if(!empty(session()->getFlashdata('fail'))): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
            <?php endif ?>
            <?php if(!empty(session()->getFlashdata('success'))): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
            <?php endif ?>       
            <div class="card-body justify-content-center" media="(max-width:768px)">
                <div class="form-group">
                    <label for="nombre_prod" class="form-label">Nombre</label>
                    <input name="nombre_prod" type="text" class="form-control" placeholder="Ingrese nombre del producto" value="<?= $producto['nombre_prod'] ?>">
                    <?php if($validation->getError('nombre_prod')): ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $validation->getError('nombre_prod'); ?>
                        </div>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label for="categoria" class="form-label">Categorías</label>
                    <select class="form-control" name="categoria" id="categoria">
                        <option value="">Seleccionar Categoría</option>
                        <?php foreach ($categorias as $categoria): ?>
                            <option value="<?= $categoria['id_categoria']; ?>" <?= $categoria['id_categoria'] == $producto['categoria_id'] ? 'selected' : '' ?>>
                                <?= $categoria['id_categoria'] . ". " . $categoria['descripcion']; ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                    <?php if($validation->getError('categoria')): ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $validation->getError('categoria'); ?>
                        </div>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label for="imagen" class="form-label">Foto o Imagen</label>
                    <input class="form-control" name="imagen" type="file" id="formFile" >
                     <?php $imagen=$producto['imagen'];?>
                      <img height="60px" width="75px" src="<?=base_url()?>/assets/uploads/<?=$imagen?>">
                    <?php if($validation->getError('imagen')): ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $validation->getError('imagen'); ?>
                        </div>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label for="precio" class="form-label">Precio</label>
                    <input name="precio" type="number" class="form-control" placeholder="Ingrese Precio $" value="<?= $producto['precio'] ?>">
                    <?php if($validation->getError('precio')): ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $validation->getError('precio'); ?>
                        </div>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label for="precio_vta" class="form-label">Precio Venta</label>
                    <input name="precio_vta" type="number" class="form-control" placeholder="Ingrese Precio Venta" value="<?= $producto['precio_vta'] ?>">
                    <?php if($validation->getError('precio_vta')): ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $validation->getError('precio_vta'); ?>
                        </div>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label for="stock" class="form-label">Stock</label>
                    <input name="stock" type="number" class="form-control" placeholder="Ingrese Stock disponible" value="<?= $producto['stock'] ?>">
                    <?php if($validation->getError('stock')): ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $validation->getError('stock'); ?>
                        </div>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label for="stock_min" class="form-label">Stock Mínimo</label>
                    <input name="stock_min" type="number" class="form-control" placeholder="Ingrese Stock Mínimo" value="<?= $producto['stock_min'] ?>">
                    <?php if($validation->getError('stock_min')): ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $validation->getError('stock_min'); ?>
                        </div>
                    <?php endif ?>
                </div>

                <input type="submit" value="Enviar" class="btn btn-success">
                <a href="<?php echo base_url('crear'); ?>" class="btn btn-danger">Cancelar</a>
                <input type="reset" value="Borrar" class="btn btn-secondary">
            </div>
        </form>       
    </div>
  </div>
 </body>
</html>