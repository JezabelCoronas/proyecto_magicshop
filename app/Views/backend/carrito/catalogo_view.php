<style>
    .card-img-top {
        object-fit: cover;
        width: 100%;
        height: 300px; 
    }
</style>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo session()->getFlashdata('success'); ?>
    </div>

<?php endif; ?>
<?php if (!$productos) { ?>  
    <div class="container-fluid">  
        <div class="well">  
            <h2>No hay Productos</h2>  
        </div>  
    </div>  
<?php } else { ?>  
    <div class="container-fluid mt-2 mb-3">
        <div class="d-flex justify-content-center">
            <img src="assets/img/banner_catalogo.jpg" class="img-fluid" alt="Banner Catálogo" style="max-width: 90%;">
        </div>
    </div>

    <div class="container-fluid">
        <div class="row row-cols-md-4 row-cols-sm-2 g-4">
            <?php foreach ($productos as $row) { ?>
                <?php $eliminado = $row['eliminado']; ?>
                <?php if ($eliminado == 'NO'): ?>
                    <div class="col">
                        <div class="card col-md-3 col-sm-12 mx-auto card text-center mb-3" style="background-color: rgb(209, 183, 120); width: 90%;">
                            <!-- Mostrar imagen del producto -->
                            <?php $imagen = $row['imagen']; ?>
                            <img src="<?= base_url('assets/uploads/' . $imagen); ?>" class="card-img-top" alt="<?php echo $row['nombre_prod']; ?>">
                            <div class="card-body">
                                <!-- Mostrar nombre del producto -->
                                <h5 class="card-title"><?php echo $row['nombre_prod']; ?></h5>
                                <!-- Mostrar precio del producto -->
                                <p class="card-text">Precio: $<?php echo $row['precio_vta']; ?></p>
                                <!-- Mostrar stock -->
                                <p class="card-text">Stock disponible: <?php echo $row['stock']; ?></p>

                                <!-- Envia los datos en forma de formulario para agregar al carrito -->
                                <?php echo form_open('carrito_agrega'); ?>  
                                    <?php 
                                        echo form_hidden('id', $row['id']);  
                                        echo form_hidden('precio_vta', $row['precio_vta']);  
                                        echo form_hidden('nombre_prod', $row['nombre_prod']); 
                                        echo form_hidden('stock', $row['stock']); 
                                        echo form_hidden('imagen', $imagen); // Agregar imagen 
                                    ?>
                                       <?php if ($row['stock'] > 0): ?>
                                        <div>  
                                            <?php  
                                            $btn = array(  
                                                'class' => 'btn btn-dark fuenteBotones',
                                                'value' => 'Agregar al Carrito',
                                                'name' => 'action'  
                                            );  
                                            echo form_submit($btn);  
                                            ?>
                                        </div>
                                    <?php else: ?>
                                        <div class="alert alert-danger" role="alert">
                                            Este producto no está disponible actualmente.
                                        </div>
                                    <?php endif; ?>

                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php } ?>
        </div>
    </div>
<?php } ?>

<hr class="hr" />
</body>
</html>
