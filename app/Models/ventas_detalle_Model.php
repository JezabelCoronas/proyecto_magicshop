<?php
namespace App\Models;
use CodeIgniter\Model;

class ventas_detalle_Model extends Model{
    protected $table = 'ventas_detalle';
    protected $primaryKey= 'id';
  protected $useAutoIncrement = true;
    protected $allowedFields= ['venta_id', 'producto_id','cantidad', 'precio'];
   
   //Insertar detalles de una venta
    public function insertDetalle($data) {
        return $this->insert($data);
    }

}