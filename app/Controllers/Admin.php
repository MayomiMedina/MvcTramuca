<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Admin extends BaseController
{

    public function index() {
        $adminModel = new AdminModel();
        return view('Admin/Dashboard', [
            'productosVendidos' => $adminModel->productosMasVendidos()
        ]);
    }
}
