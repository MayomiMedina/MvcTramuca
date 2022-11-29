<?php

namespace App\Controllers;
use App\Models\ModelAlma;

use App\Controllers\BaseController;

class AlmacenController extends BaseController
{
    public function index()
    {
        $alma=new ModelAlma();


        $datos['z']=$alma->select('tb_almacen.id_almacen,
          tb_almacen.id_producto,tb_almacen.fecha,tb_almacen.seccion,
          tb_producto.producto,
          tb_producto.stock,
          tb_producto.categoria,tb_producto.marca,tb_producto.codigo ')
          ->join('tb_producto', 'tb_almacen.id_producto = tb_producto.id_producto')
          ->findAll();
          

        return view('almacen/almacen',$datos);        
    }
    public function guardar(){
      $pro=new ModelAlma();

      $datos=[
      'fecha'=>$this->request->getVar('fec'),
      'id_producto'=>$this->request->getVar('pro'),  
      'Seccion'=>$this->request->getVar('sec')
      ];
      $pro->insert($datos);

      return $this->response->redirect(base_url('/AlmacenController/index'));
    }
    public function borrar(){
      $pro=new ModelAlma();

      $id=$this->request->getVar('id');//aqui obtengo el valor del modal
      $datos2=$pro->where('id_almacen',$id)->first();  //no tengo idea que es esto pero de algo sirve xddd

      $pro->where('id_almacen',$id)->delete($id);

      return $this->response->redirect(base_url('/AlmacenController/index'));
      
  }
  public function editar(){
    $pro=new ModelAlma();

    $id=$this->request->getVar('id');
    $datos=[
      'id_producto'=>$this->request->getVar('pro'),  
      'fecha'=>$this->request->getVar('fec'),    
      'Seccion'=>$this->request->getVar('secc')
      ];

    $pro->update($id,$datos);


    return $this->response->redirect(base_url('/AlmacenController/index'));
}

}
