<?php
namespace App\Models;

use CodeIgniter\Model;

class ventas_cabecera_Model extends Model
{
    protected $table = 'ventas_cabecera';
    protected $primaryKey = 'id';
    protected $allowedFields = ['fecha', 'usuario_id', 'total_venta'];

    //Insertar cabecera de una venta
    public function insertVenta($data) {
        return $this->insert($data);
    }
}
