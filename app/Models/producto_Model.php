<?php
namespace App\Models;
use CodeIgniter\Model;

class producto_Model extends Model{
    protected $table = 'productos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre_prod', 'imagen', 'categoria_id', 'precio', 'precio_vta', 'stock', 'stock_min', 'eliminado'];

    //constructor
    public function getBuilderProductos(){
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->select('*');
        $builder->join('categorias', 'categorias.id_categoria = productos.categoria_id');
        return $builder;
    }
     
     //Devuelve todos los productos
    public function getProductoAll()
    {
        $builder = $this->getBuilderProductos();
        return $builder->get()->getResultArray();
    }

    //Devuelve 1 producto
    public function getProducto($id = null){
        $builder = $this->getBuilderProductos();
        $builder->where('productos.id', $id);
        $query = $builder->get();
        return $query->getRowArray();
    }
    
    //Devuelve detalle de ventas
    public function getventasdetalle($id){
        $this->db->join('productos','productos.id_producto = ventas_detalle.producto_id');
        $query = $this->db->get_where('ventas_detalle', array('venta_id' => $id));
        if($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    //actualiza el stock
     public function updateStock($id, $new_stock) {
        return $this->update($id, ['stock' => $new_stock]);
    }
}
?>
