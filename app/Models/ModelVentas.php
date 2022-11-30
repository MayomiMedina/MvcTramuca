<?php 
namespace App\Models;

use CodeIgniter\Model;

//te dije que no vieras nada aqui e.e
class ModelVentas extends Model{
    protected $table      = 'tb_boleta';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_boleta';
    protected $allowedFields=['id_cliente','id_producto','fecha','RUC','descripcion','comprobante','cantidad',
    'precio','total'];
}