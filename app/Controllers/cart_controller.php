<?php

namespace App\Controllers;
use App\Models\usuario_Model;
use App\Models\producto_model;
use CodeIgniter\Controller;

class cart_controller extends BaseController{
    public function __construct(){
        helper(['form', 'url', 'cart']);

        $session = session();
        $cart = \Config\Services::cart();
        $cart->contents();
    }

    //Devuelve contenidos del carrito
    public function devolver_carrito(){
        $cart = \Config\Services::cart();
        return $cart->contents();
    }

    //Visualizar Catálogo (Para cliente logueado)
    public function catalogo(){
        $session=session();
        $dato = array('titulo' => 'Todos los Productos');
        $producto_model = new producto_model();
        $data['productos'] = $producto_model->orderBy('id', 'DESC')->findAll();

        echo view('plantillas/header',$dato);
        echo view('plantillas/navbar');
        echo view('backend/carrito/catalogo_view',$data);
        echo view('plantillas/footer');    
    }

    //añadir producto y visualizar mensaje de error
    public function add(){
        $cart = \Config\Services::Cart();
        $request = \Config\Services::request();
        $cart->insert(array(
            'id'    => $request->getPost('id'),
            'qty'   => 1,
            'price' => $request->getPost('precio_vta'),
            'name'  => $request->getPost('nombre_prod'),
            'options' => array('imagen' => $request->getPost('imagen'))
        ));

        session()->setFlashdata('success', 'Producto agregado al carrito correctamente.');
        return redirect()->back()->withInput();
    }

    //Actualizar carrito
    public function actualiza_carrito(){
        $cart = \Config\Services::Cart();

        $request = \Config\Services::request();
        $cart->update(array(
            'id'    => $request->getPost('id'),
            'qty'   => 1,
            'price' => $request->getPost('precio_vta'),
            'name'  => $request->getPost('nombre_prod'),
            'options' => array('imagen' => $request->getPost('imagen'))
        ));

        return redirect()->back()->withInput();
    }

//Quitar productos
    public function remove($rowid) {
        $cart = \Config\Services::Cart();  
        $request= \Config\Services::request();  
        //Si $rowid es "all" destruye el carrito  
            if ($rowid==="all") {
                $cart->destroy();  
            } else { //Sino destruye solo la fila seleccionada  
                $cart->remove($rowid);  
            }
            // Redirige a la misma página que se encuentra  
            return redirect()->back()->withInput();  
    }
   
   //Borrar/limpiar carrito
    public function borrar_carrito() {
        $cart = \Config\Services::Cart();
        $cart->destroy(); // Eliminar todo el carrito
        return redirect()->back()->withInput();
    }

    //Muestra los detalles de la venta y confirma  
    public function muestra() {
        helper (['form', 'url', 'cart']);  
        $cart = \Config\Services::cart();  
        $cart = $cart->contents();  

        $dato = array('titulo' => 'Confirmar compra');  

        $session = session();  
        $nombre = $session->get('nombre');  
        $perfil_id = $session->get('perfil_id');  
        $email = $session->get('email');  

        echo view('plantillas/header',$dato);
        echo view('plantillas/navbar');
        echo view('backend/carrito/carrito_view');
        echo view('plantillas/footer'); 
    }

  //Realizar una compra , resta el stock
    public function comprar_carrito() {
        $cart = \Config\services::cart();  
        //var_dump($cart->contents());  
        
        $productos = $cart->contents();  
        $request = \Config\Services::request();  
        $montoTotal = 0;

        foreach($productos as $producto) {
            $montoTotal +=  $producto["price"] * $producto["qty"];  
        }

        $ventaCabecera = new ventas_cabecera_model();  
        $idcabecera = $ventaCabecera->insert(["total_venta" => $montoTotal, "usuario_id" => session()->id]);  
          
        $ventaDetalle = new ventas_detalle_model ();  
        $producto_model = new producto_model();  

        foreach($productos as $producto) {
            $ventaDetalle->insert([
                "venta_id" => $idcabecera, 
                "producto_id" => $producto["id"],  
                "stock" => $producto["qty"], 
                "precio" => $producto["price"]
            ]);  
            $producto_model->update($producto["id"], ["stock" => $producto["stock"] - $producto["qty"] ]);        
        }
    }
}
?>