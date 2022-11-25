<?php

namespace App\Controllers;
use App\Models\ModelClien;
use App\Controllers\BaseController;

class ClienteController extends BaseController
{
    public function index()
    {
        $cliente=new ModelClien();
        $datos['s']=$cliente->orderBy('id_cliente','ASC')->findAll();

        return view('cliente/cliente',$datos);
    }
    public function guardar(){
        $pro=new ModelClien();

        $datos=[
        'nombre'=>$this->request->getVar('nom'),
        'apellido'=>$this->request->getVar('ape'),
        'celular'=>$this->request->getVar('cel'),
        'DNI'=>$this->request->getVar('DNI'),
        'direccion'=>$this->request->getVar('dir'),
        ];
        $pro->insert($datos);

        $datos['s']=$pro->orderBy('id_cliente','ASC')->findAll();
        return view('cliente/cliente',$datos);
        
    }
}
