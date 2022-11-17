<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProductoController extends BaseController
{
    public function index()
    {
        return view('productos/productos');
    }
}
