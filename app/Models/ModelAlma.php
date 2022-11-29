<?php 
namespace App\Models;

use CodeIgniter\Model;

//te dije que no vieras nada aqui e.e
class ModelAlma extends Model{
    protected $table      = 'tb_almacen';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_almacen';
    protected $allowedFields=['id_producto','fecha','Seccion'];
}