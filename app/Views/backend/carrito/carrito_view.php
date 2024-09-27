<script src=" <?php echo base_url("assets/js/bootstrap.bundle.min.js")?>" type="text/javascript"></script>

<div class="container-fluid" id="carrito">  
    <div class="cart" >  
        <div class = "heading">
            <h2>Productos en tu Carrito</h2>  
        </div>  
        <div class="text" align="center">  
            <?php  
                $session=session();  
                $cart = \Config\services::cart();  
                $cart = $cart->contents();  
                
            // Si el carrito está vacio, mostrar el siguiente mensaje  
            if (empty ($cart))  
            {
                echo 'Para agregar productos al carrito, click en'; ?>  
                <a class="btn btn-warning text-dark mt-2" href="<?php echo base_url('/todos_p') ?>">  
                    <i class="carrois-gothic-light"></i>  
                        Volver al catálogo  
                    </a>  
                <?php } ?>  
            </div>  
        </div>  

        <?php if (session()->getFlashdata('mensaje')){
            echo  
            "<div class ='alert alert-success alert-dismissible fade show text-center mb-3 w-50 mx-auto  role = 'alert'>  
                <h4 class = ''> &iexclStock NO Disponible! </h4>  
                <button type = 'button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'> </button>  
            </div>"; 
        } ?>  
    
    <table class="table table-hover table-dark table-responsive-md" border="0" cellpadding="7px" cellspacing="1px">  
        <!--table class="table table-striped"-->  
        <?php // Todos los items de carrito en "$cart"  
            // if ($cart = $this->cart->contents()): //Esta función devuelve un array de los elementos agregados en el carro  
            if ($cart == TRUE): ?>  
                <div class="container">  
                    <div class="table-responsive-sm"> 
                        <table class="table table-bordered table-hover table-light table-striped ml-3">  
                            <tr>  
                                
                                <td>ID</td>  
                                <td></td>
                                <td>Producto</td>  
                                <td>Precio</td>  
                                <td>Cantidad</td>  
                                <td>Subtotal</td> 
                                <td></td>
                            <tr>
                            
                            <?php // Crea un formulario y manda los valores a carrito_controller/actualiza carrito  
                                echo form_open('carrito_actualiza');//ruta  
                                $gran_total = 0;  
                                $i = 1;  
                                // foreach ($this->cart->contents( as $items):  
                                    foreach ($cart as $item):  
                                        // echo "<table class='table table-striped'>";  
                                        echo form_hidden('cart[' . $item['id'] . '][id]',    $item['id']);  
                                        echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);  
                                        echo form_hidden('cart[' . $item['id'] . '][name]',  $item['name']);  
                                        echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']); 
                                        echo form_hidden('cart[' . $item['id'] . '][qty]',   $item['qty']);
                            ?>
                        <tr>
                            <td> <?php echo $i++; ?> </td>  
                            <td align="center"> 
                                <img src="<?= base_url('assets/uploads/' . $item['options']['imagen']); ?>" width="60px" height="60px"> 
                            </td>
                            <td> <?php echo $item['name']; ?> </td>  
                            <td> $<?php echo number_format($item['price'], 2); ?> </td>  
                            <td> <?php echo $item ['qty']; ?> </td>  
                                <?php $gran_total += $item['price'] * $item['qty']; ?>  
                            <td> $<?php echo number_format($item['subtotal'], 2) ?> </td>  
                            <td class="text-end">
                                <a href="<?php echo base_url('carrito_elimina/' .$item['rowid']);?>" class="btn btn-danger btn-sm mt-1">
                                    <svg style="background-color: rgb(219, 55, 66)" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                    </svg>
                                </a>
                            </td> 
                        </tr>  
                    <?php 
                    endforeach;   ?>

                    <tr class="table: light"> 
                        <td colspan="5">
                            <td>Total: $<?php echo number_format($gran_total, 2); ?> </td>
                        </td>
                        <td colspan="0" class="text-end">  
                            <!-- Borrar carrito usa mensaje de confirnacion javascript implementado en head_view -->  
                            <input type="button" class='btn btn-primary' value="Borrar Carrito" onClick="window.location = 'borrar'">
                            
                            <!-- Submit boton. Actualiza los datos en el carrito -->  
                            <!-- input type="submit" class ="btn btn-primary' value="Actualizar" -->
                            <!-- " Confirnar orden envia a carrito_controller/muestra conpra --> 
                            <input type="button" class='btn btn-primary' value="Comprar" onClick="window.location = 'carrito_comprar'">  
                        </td>                       
                    <tr>
                <?php echo form_close();  
                    endif; ?>
                 </table>
            </div>
         </div><br>
        <hr class="hr" />
    </body>
</html>
