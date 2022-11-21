<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminUsuController extends BaseController
{
    public function index()
    {
        return view('crudUsuarios/crudUsuarios');
    }
}
