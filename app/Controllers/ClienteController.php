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
        'direccion'=>$this->request->getVar('dir')
        ];
        $pro->insert($datos);
//AHORA TE GUARDA Y TE LISTAAAA IZIIII
        return $this->response->redirect(base_url('/clientecontroller/index'));
        
    }
    //Aqui es BORRAR EL METODO (NO SE  HIZO NADA EN EL MODALCLIEN, asi que ni lo veas) es izi entender
    //YA ESTAA
    public function borrar(){
        $pro=new ModelClien();

        $id=$this->request->getVar('idclientess');//aqui obtengo el valor del modal
        $datos2=$pro->where('id_cliente',$id)->first();  //no tengo idea que es esto pero de algo sirve xddd

        $pro->where('id_cliente',$id)->delete($id);

        return $this->response->redirect(base_url('/clientecontroller/index'));
        
    }
    //aqui esta modificar es izi muy izi casi igual que el guardar datos
    public function editar(){
        $pro=new ModelClien();

        $id=$this->request->getVar('idcliente');
        $datos=[
            'nombre'=>$this->request->getVar('nom'),
            'apellido'=>$this->request->getVar('ape'),
            'celular'=>$this->request->getVar('cel'),
            'DNI'=>$this->request->getVar('DNI'),
            'direccion'=>$this->request->getVar('dir')
        ];

        $pro->update($id,$datos);


        return $this->response->redirect(base_url('/clientecontroller/index'));
    }
}
