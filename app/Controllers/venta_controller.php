<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\producto_Model;
use App\Models\usuarios_Model;
use App\Models\categoria_Model;
use App\Models\venta_Model;
use App\Models\ventas_detalle_Model;
use App\Models\ventas_cabecera_Model;

class venta_controller extends Controller{

//Permite pasar los datos de cada venta, de cada producto y muestra la view de ventas para el Admin
  public function index(){
    $ventasDetalleModel = new ventas_detalle_Model();
    $ventasCabeceraModel = new ventas_cabecera_Model();
    $productoModel = new producto_Model();
    
    //obtener todos los productos             
    $data['productos'] = $productoModel->getProductoAll();

    // Obtener todas las ventas (Cabecera)
    $ventas = $ventasCabeceraModel->findAll();

    // Para cada venta, obtener los detalles
    foreach ($ventas as &$venta) {
        $venta['detalles'] = $ventasDetalleModel->where('venta_id', $venta['id'])->findAll();
    }

    // Pasar los datos a la vista en $ventas
    echo view('plantillas/header');
    echo view('plantillas/navbar');
    echo view('backend/ventas/ventas_view', ['ventas' => $ventas, 'productos' => $data['productos']]);
    echo view('plantillas/footer');
}


  //Registra una venta tras hacer clic en el carrito
  public function registrar_venta(){
    $session = session();

    require(APPPATH . 'Controllers/cart_controller.php');
    $cart = new cart_controller();
    //Retorna los contenidos del carrito
    $carrito_contents = $cart->devolver_carrito();
    
    $ventas = new Ventas_cabecera_model();
    $detalleventas = new Ventas_detalle_model();
    $producto = new Producto_model();

    // Inicializar total general
    $total = 0;

    // Verificar stock para cada artículo en el carrito antes de proceder
    foreach ($carrito_contents as $row) {
        $producto_actual = $producto->getProducto($row['id']);
        if ($producto_actual['stock'] < $row['qty']) {
            $session->setFlashdata('mensaje', 'No hay stock disponible para el producto "' . $row['name'] . '"');
            return redirect()->to(base_url('muestro'));
        }
        // Calcular el total (acumulado)
        $total += $row['subtotal'];
    }

    // Si hay stock suficiente para todos los productos, proceder con la venta
    $nueva_venta = [
        'usuario_id' => $session->get('id_usuario'),
        'total_venta' => $total
    ];
    $venta_id = $ventas->insert($nueva_venta); // Insertar en ventas_cabecera

    // Insertar cada artículo en ventas_detalle y actualizar el stock
    foreach ($carrito_contents as $row) {
        $producto_actual = $producto->getProducto($row['id']);
        $detalle = [
            'venta_id' => $venta_id,
            'producto_id' => $row['id'],
            'cantidad' => $row['qty'],
            'precio' => $row['subtotal']
        ];
        $detalleventas->insert($detalle); // Insertar en ventas_detalle

        // Actualizar el stock
        $producto->updateStock($row['id'], $producto_actual['stock'] - $row['qty']);
    }

    // Borrar el carrito y establecer mensaje de éxito
    $cart->borrar_carrito();
    $session->setFlashdata('mensaje', "Venta registrada Exitosamente");

    return redirect()->to(base_url('/mis_compras'));
}


  //función del usuario cliente para ver historial de sus propias compras
    public function ver_factura($venta_id){
         //echo $venta_id;die;
        $detalle_ventas = new detalle_venta_Model();
        $data['venta'] = $detalle_ventas->getDetalles($venta_id);
        
          $dato['titulo'] = "Mi compra";

        echo view('plantillas/header',$dato);
        echo view('plantillas/navbar');
        echo view('backend/ventas/mis_compras_view',$data);
        echo view('plantillas/footer');
    }

     //función del cliente para ver el detalle de su facturas de compras
      public function ver_facturas_usuario($id_usuario){
       
        $ventas = new ventas_cabecera_model;
           
        $data['ventas'] = $ventas->getVentas($id_usuario);
        $dato['titulo'] = "Todas mis compras";
            
          echo view('plantillas/header');
      }

    //Función para la view que muestra información de las compras del cliente, "Mis Compras"
     public function listar_ventas() {
                $session = session();
                $id_usuario = $session->get('id_usuario');

                $ventasCabeceraModel = new ventas_cabecera_Model();
                $ventasDetalleModel = new ventas_detalle_Model();
                
                $productoModel = new producto_Model();
                 $data['productos'] = $productoModel->getProductoAll();


                // Obtener las ventas del usuario actual
                $ventas = $ventasCabeceraModel->where('usuario_id', $id_usuario)->findAll();

                // Obtener los detalles de cada venta del usuario actual
                foreach ($ventas as &$venta) {
                    $venta['detalles'] = $ventasDetalleModel->where('venta_id', $venta['id'])->findAll();
                }

                $data['ventas'] = $ventas;
                $data['titulo'] = 'Ventas';

                echo view('plantillas/header', $data);
                echo view('plantillas/navbar');
                echo view('backend/ventas/mis_compras_view', $data);
                echo view('plantillas/footer');
            }


}

?>