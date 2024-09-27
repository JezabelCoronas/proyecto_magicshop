<?php

namespace App\Controllers;

use App\Models\producto_Model;
use App\Models\categoria_Model;
use CodeIgniter\Controller;

class producto_controller extends Controller{
    public function __construct(){
        helper(['url', 'form']);
        $session=session();
    }
  
  //Mostrar CRUD de productos
    public function index(){
        $productoModel = new producto_Model();
        $data['productos'] = $productoModel->getProductoAll();

        $dato['titulo'] = 'crud_productos';
        echo view('plantillas/header', $dato);
        echo view('plantillas/navbar');
        echo view('backend/producto/producto_nuevo_view', $data);
        echo view('plantillas/footer');
    }

    
    //Mostrar vista con el formulario para que el Admin pueda ingresar un producto al catálogo
    public function crea_producto(){
        $categoriaModel = new Categoria_Model();
        $data['categorias'] = $categoriaModel->getCategorias();

        $productoModel = new Producto_Model();
        $data['productos'] = $productoModel->getProductoAll();

        $data['titulo'] = 'Alta Producto';
        echo view('plantillas/header', $data);
        echo view('plantillas/navbar');
        echo view('backend/producto/alta_producto_view', $data);
        echo view('plantillas/footer');
    }

    //Formulario
    public function formValidation(){
        $validationRules = [
            'nombre_prod' => 'required|min_length[2]',
            'categoria' => 'required|is_not_unique[categorias.id_categoria]',
            'precio' => 'required',
            'precio_vta' => 'required',
            'stock' => 'required',
            'stock_min' => 'required'
        ];

        $validationMessages = [
            'nombre_prod' => [
                'required' => 'El campo es obligatorio.',
                'min_length' => 'Debe tener al menos 2 caracteres'
            ],
            'categoria' => ['required' => 'El campo categoría es obligatorio.'],
            'precio' => ['required' => 'El campo precio es obligatorio'],
            'precio_vta' => ['required' => 'El campo precio Venta es obligatorio'],
            'stock' => ['required' => 'El campo stock es obligatorio'],
            'stock_min' => ['required' => 'El campo stock Minimo es obligatorio']
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            $data['titulo'] = 'Alta Producto';
            $categoriaModel = new Categoria_Model();
            $data['categorias'] = $categoriaModel->getCategorias();

            echo view('plantillas/header', $data);
            echo view('plantillas/navbar');
            echo view('backend/producto/alta_producto_view', $data);
            echo view('plantillas/footer');
        } else {
            //Incorporar imagen
            $img = $this->request->getFile('imagen');
            $nombre_aleatorio = $img->getRandomName();
            $img->move(ROOTPATH . 'assets/uploads', $nombre_aleatorio);

            $productoModel = new Producto_Model();
            $productoModel->save([
                'nombre_prod' => $this->request->getVar('nombre_prod'),
                'imagen' => $nombre_aleatorio,
                'categoria_id' => $this->request->getVar('categoria'),
                'precio' => $this->request->getVar('precio'),
                'precio_vta' => $this->request->getVar('precio_vta'),
                'stock' => $this->request->getVar('stock'),
                'stock_min' => $this->request->getVar('stock_min'),
            ]);

            session()->setFlashdata('success', 'Alta Exitosa...');
            return redirect()->to(site_url('/crear'));
        }
    }

   //Editar 1(un) producto según id
    public function singleproducto($id){
        $categoriaModel = new Categoria_Model();
        $data['categorias'] = $categoriaModel->getCategorias();

        $productoModel = new Producto_Model();
        $data['producto'] = $productoModel->where('id', $id)->first();

        $dato['titulo'] = 'Editar Producto';
        echo view('plantillas/header', $dato);
        echo view('plantillas/navbar');
        echo view('backend/producto/editar_producto_view', $data);
        echo view('plantillas/footer');
    }


   //Actualizar un producto
    public function actualizarPro($id){
        $productoModel = new Producto_Model();
        $id = $productoModel->where('id', $id)->first();

        $img= $this->request->getFile('imagen');
        //Verifica si se cargó imagen válida

        if ($img && $img->isValid()){
            $nombre_aleatorio= $img->getRandomName();
            $img->move(ROOTPATH. 'assets/uploads', $nombre_aleatorio);
            $data= [
                'nombre_prod' => $this->request->getVar('nombre_prod'),
                'imagen'=> $img->getName(),
                'categoria_id'=> $this->request->getVar('categoria'),
                'precio'=> $this->request->getVar('precio'),
                'precio_vta'=> $this->request->getVar('precio_vta'),
                'stock'=> $this->request->getVar('stock'),
                'stock_min'=> $this->request->getVar('stock_min'), 
            ];
        }else{
            $data= [
            'nombre_prod' => $this->request->getVar('nombre_prod'),
            'categoria_id' => $this->request->getVar('categoria'),
            'precio' => $this->request->getVar('precio'),
            'precio_vta' => $this->request->getVar('precio_vta'),
            'stock' => $this->request->getVar('stock'),
            'stock_min' => $this->request->getVar('stock_min'),

            ];
        }
        $productoModel->update($id, $data);
        session()->setFlashdata('success', 'Modificación exitosa...');
        return $this->response->redirect(site_url('/crear'));
    }

    
   //Eliminar 1 producto
    public function deletelogico($id = null)
    {
        $productoModel = new Producto_Model();
        $data['eliminado'] = $productoModel->where('id', $id)->first();//no pusiste esta consulta y por ende no hacia el delete logico
        
        $data = ['eliminado' => 'SI'];
        $productoModel->update($id, $data);
        return $this->response->redirect(site_url('/crear'));
    }
    
    //Activar 1 producto ya eliminado
    public function activarproducto($id = null){
        $productoModel = new Producto_Model();
        $data['eliminado'] = $productoModel->where('id', $id)->first(); //aca tambien primero debe hacerse la consulta de ese id

        $data = ['eliminado' => 'NO'];
        $productoModel->update($id, $data);
        return $this->response->redirect(site_url('crear'));
    }
    
    //Mostrar lista de productos eliminados
    public function eliminados_prod(){
        $productoModel = new Producto_Model();
        $data['productos'] = $productoModel->where('eliminado', 'SI')->findAll();

        $data['titulo'] = 'Productos Eliminados';
        echo view('plantillas/header', $data);
        echo view('plantillas/navbar');
        echo view('backend/producto/productos_eliminados', $data);
        echo view('plantillas/footer');
    }
   
}

?>


