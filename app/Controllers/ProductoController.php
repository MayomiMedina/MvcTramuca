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
    public function pdf(){
        $pdf=new \Dompdf\Dompdf();
        $producto= new ModelProducto();
        $datos['s']=$producto->orderBy('id_producto','ASC')->findAll();;
  
        //$html="<h1>jajaja</h1>";
        $option=$pdf->getOptions();
        $option->set(array('isRemoteEnabled'=>true));
        $pdf->setOptions($option);
        
        $pdf->load_html(view('productos/productospdf',$datos));
      
        $pdf->setPaper('A4','landscape');
        $pdf->render();
        $pdf->stream("Lista de productos");
    }
    public function guardar(){
        $pro = new ModelProducto();

        $produc=$this->request->getVar('nomb');
        $producdo2=substr($produc,0,2);

        $marca=$this->request->getVar('mar');
        $marca2=substr($marca,0,2);

        $juntos=$producdo2.$marca2;
        

        $datos=[
        'producto'=>$this->request->getVar('nomb'),
        'codigo'=>$juntos,
        'categoria'=>$this->request->getVar('cat'),
        'marca'=>$this->request->getVar('mar'),
        ];
        $pro->insert($datos);

        return $this->response->redirect(base_url('/productocontroller/index'));
        
        
    }
    
    public function borrar(){
        $pro=new ModelProducto();

        $id=$this->request->getVar('idproductos');//aqui obtengo el valor del modal
        $datos2=$pro->where('id_producto',$id)->first();  //no tengo idea que es esto pero de algo sirve xddd

        $pro->where('id_producto',$id)->delete($id);

        return $this->response->redirect(base_url('/productocontroller/index'));
        
    }
    
    public function editar(){
        $pro=new ModelProducto();

        $id=$this->request->getVar('idproducto');

        $produc=$this->request->getVar('NomU');
        $producdo2=substr($produc,0,2);

        $marca=$this->request->getVar('mar');
        $marca2=substr($marca,0,2);

        $juntos=$producdo2.$marca2;

        $datos=[
                   
            'producto'=>$this->request->getVar('NomU'),
            'codigo'=>$juntos,
            'categoria'=>$this->request->getVar('cat'),
            'marca'=>$this->request->getVar('mar'),
        ];

        $pro->update($id,$datos);


        return $this->response->redirect(base_url('/productocontroller/index'));
    }
}
