<?php
namespace App\Models;
use CodeIgniter\Model;

class consulta_Model extends Model{
    protected $table      = 'consultas';
    protected $primaryKey = 'id_consulta';
    protected $allowedFields = ['consulta_nombre','consulta_apellido', 'consulta_email', 'consulta_telefono','consulta_mensaje', 'respondida'];
}