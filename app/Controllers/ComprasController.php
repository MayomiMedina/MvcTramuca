<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ComprasController extends BaseController
{
    public function index()
    {
        return view('compras/compras');
    }
}
