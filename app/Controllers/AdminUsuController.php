<?php

namespace App\Controllers;
use App\Models\ModelAdminUsu;
use App\Controllers\BaseController;

class AdminUsuController extends BaseController
{
    public function index()
    {
        $usu=new ModelAdminUsu();
        $datos['s']=$usu->orderBy('idusu','ASC')->findAll();
        return view('crudUsuarios/crudUsuarios', $datos);
    }
public function guardar(){


    $usu=new ModelAdminUsu();
$pass=$this->request->getVar('con');
$pass_cifrado= password_hash($pass,PASSWORD_DEFAULT);
    $datos=[
    'idusu'=>$this->request->getVar('idusu'),
    'nombre'=>$this->request->getVar('nom'),
    'apellidos'=>$this->request->getVar('ape'),
    'usuario'=>$this->request->getVar('usu'),
    'contra'=>$pass_cifrado,
    'area'=>$this->request->getVar('are'),
    'estado'=>$this->request->getVar('est'),
    'idcargo'=>$this->request->getVar('car')
    ];
    $usu->insert($datos);
    return $this->response->redirect(base_url('/adminUsuController/index'));
    
}

public function borrar(){
    $usu=new ModelAdminUsu();

    $id=$this->request->getVar('idusu');
    $datos2=$usu->where('idusu',$id)->first();  

    $usu->where('idusu',$id)->delete($id);

    return $this->response->redirect(base_url('/adminUsuController/index'));
    
}

public function editar(){
    $usu=new ModelAdminUsu();

    $id=$this->request->getVar('idusu');
    $datos=[
        'idusu'=>$this->request->getVar('idusu'),
        'nombre'=>$this->request->getVar('nom'),
        'apellidos'=>$this->request->getVar('ape'),
        'usuario'=>$this->request->getVar('usu'),
        'area'=>$this->request->getVar('are'),
        'estado'=>$this->request->getVar('est'),
        'idcargo'=>$this->request->getVar('car')
    ];

    $usu->update($id,$datos);


    return $this->response->redirect(base_url('/adminUsuController/index'));
}
}

