<?php 
namespace App\Models;

use CodeIgniter\Model;

//te dije que no vieras nada aqui e.e
class ModelClien extends Model{
    protected $table      = 'tb_cliente';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_cliente';
    protected $allowedFields=['nombre','apellido','celular','DNI','direccion'];
}