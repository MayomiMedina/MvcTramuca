<?php

namespace App\Controllers;
use App\Models\ModelProducto;
use App\Controllers\BaseController;

class ProductoController extends BaseController
{
    public function index()
    {
        $producto= new ModelProducto();
        $datos['s']=$producto->orderBy('id_producto','ASC')->findAll();
        return view('productos/productos',$datos);
    }

    public function guardar(){
        $pro = new ModelProducto();

        $datos=[
        'producto'=>$this->request->getVar('nomb'),
        'codigo'=>$this->request->getVar('cod'),
        'categoria'=>$this->request->getVar('cat'),
        'marca'=>$this->request->getVar('mar'),
        ];
        $pro->insert($datos);

        return $this->response->redirect(base_url('/productocontroller/index'));
        
    }
    //Aqui es BORRAR EL METODO (NO SE  HIZO NADA EN EL MODALCLIEN, asi que ni lo veas) es izi entender
    //YA ESTAA
    public function borrar(){
        $pro=new ModelProducto();

        $id=$this->request->getVar('idproductos');//aqui obtengo el valor del modal
        $datos2=$pro->where('id_producto',$id)->first();  //no tengo idea que es esto pero de algo sirve xddd

        $pro->where('id_producto',$id)->delete($id);

        return $this->response->redirect(base_url('/productocontroller/index'));
        
    }
    //aqui esta modificar es izi muy izi casi igual que el guardar datos
    public function editar(){
        $pro=new ModelProducto();

        $id=$this->request->getVar('idproducto');
        $datos=[
                   
            'producto'=>$this->request->getVar('NomU'),
            'codigo'=>$this->request->getVar('cod'),
            'categoria'=>$this->request->getVar('cat'),
            'marca'=>$this->request->getVar('mar'),
        ];

        $pro->update($id,$datos);


        return $this->response->redirect(base_url('/productocontroller/index'));
    }
}
