<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class AdminModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_compra';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];



    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function __construct() {
        parent::__construct();
        $this->db = Database::connect();
        $this->builder = $this->db->table($this->table);
    }

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function productosMasVendidos() : array
    {
        $this->builder->select('tb_producto.producto, SUM(tb_compra.cantidad) as  suma');
        $this->builder->join('tb_producto', 'tb_compra.id_producto = tb_producto.id_producto');
        $this->builder->groupBy('tb_producto.producto');
        $this->builder->orderBy('tb_producto.producto', 'DESC');
        $r = $this->builder->get()->getResultObject();
        return $r;
    }
}
