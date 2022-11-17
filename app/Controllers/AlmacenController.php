<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AlmacenController extends BaseController
{
    public function index()
    {
        return view('almacen/almacen');
    }
}
