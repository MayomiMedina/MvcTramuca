<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class VentasController extends BaseController
{
    public function index()
    {
        return view('ventas/ventas');
    }
}
