<?php 
namespace App\Models;

use CodeIgniter\Model;

//te dije que no vieras nada aqui e.e
class ModelCompra extends Model{
    protected $table      = 'tb_compra';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'idcompra';
    protected $allowedFields=['id_cliente','id_producto','numcomproban','fecha','proveedor','cantidad','precio',
    'total'];
}