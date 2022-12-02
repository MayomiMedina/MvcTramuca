<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AyudaController extends BaseController
{
    public function index()
    {
        return view('Ayuda/Ayuda');
    }
}
