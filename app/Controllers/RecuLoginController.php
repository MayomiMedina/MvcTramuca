<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RecuLoginController extends BaseController
{
    public function index()
    {
        return view('recu/restauracion');
    }
}
