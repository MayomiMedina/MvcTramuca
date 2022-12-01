<?php

namespace App\Controllers;
use App\Models\ModelCompra;
use App\Models\ModelProducto;
use App\Controllers\BaseController;

class ComprasController extends BaseController
{
    public function index()
    {
        $compra=new ModelCompra();

        $datos['s']=$compra->select('tb_compra.idcompra,tb_producto.producto,tb_producto.codigo,
          tb_compra.numcomproban,tb_compra.fecha,tb_compra.cantidad,tb_compra.precio,tb_compra.total,
         tb_cliente.nombre')
         ->join('tb_producto','tb_compra.id_producto=tb_producto.id_producto')
         ->join('tb_cliente','tb_compra.id_cliente=tb_cliente.id_cliente')
         ->orderBy('idcompra','ASC')
         ->findAll();
         
        return view('compras/compras',$datos);
    }
    public function pdf(){
        $pdf=new \Dompdf\Dompdf();
        $compra=new ModelCompra();

        $datos['s']=$compra->select('tb_compra.idcompra,tb_producto.producto,tb_producto.codigo,
          tb_compra.numcomproban,tb_compra.fecha,tb_compra.cantidad,tb_compra.precio,tb_compra.total,
         tb_cliente.nombre')
         ->join('tb_producto','tb_compra.id_producto=tb_producto.id_producto')
         ->join('tb_cliente','tb_compra.id_cliente=tb_cliente.id_cliente')
         ->orderBy('idcompra','ASC')
         ->findAll();
  
        //$html="<h1>jajaja</h1>";
        $option=$pdf->getOptions();
        $option->set(array('isRemoteEnabled'=>true));
        $pdf->setOptions($option);
        
        $pdf->load_html(view('compras/compraspdf',$datos));
      
        $pdf->setPaper('A4','landscape');
        $pdf->render();
        $pdf->stream("Compras Lista");
  
      }
    public function guardar(){
        $compra=new ModelCompra();
        $pro=new ModelProducto();

        $uno=$this->request->getVar('can');

        $idpro=$this->request->getVar('pro');

        $produ=$pro->select('stock,precio')
                ->where('id_producto',$idpro)
                    ->first();
        $tota=$produ['stock']+$uno;

        $datos=[
            'id_producto'=>$this->request->getVar('pro'),
            'id_cliente'=>$this->request->getVar('cli'),
            'numcomproban'=>$this->request->getVar('num'),
            'fecha'=>$this->request->getVar('fec'),
            'cantidad'=>$this->request->getVar('can'),
            'precio'=>$this->request->getVar('peu')            
        ];
        $datos2=array(
            'stock'=>$tota
        );
        $compra->insert($datos);
        $pro->update($idpro,$datos2);

        return $this->response->redirect(base_url('/ComprasController/index'));
    }
    public function borrar(){
        $compra=new ModelCompra();

        $id=$this->request->getVar('idcompra');
        $datos2=$compra->where('idcompra',$id)->first();

        $compra->where('idcompra',$id)->delete($id);

        return $this->response->redirect(base_url('/ComprasController/index'));
    }
    public function editar(){
        $compra=new ModelCompra();
        $pro=new ModelProducto();

        $uno=$this->request->getVar('can');

        $idpro=$this->request->getVar('pro');        
        $id=$this->request->getVar('idcompra');

        $produ=$pro->select('stock')
                    ->where('id_producto',$idpro)
                    ->first();
        $tota=$produ['stock']+$uno;

        $datos=[
            'id_producto'=>$this->request->getVar('pro'),
            'id_cliente'=>$this->request->getVar('cli'),
            'numcomproban'=>$this->request->getVar('num'),
            'fecha'=>$this->request->getVar('fec'),
            'cantidad'=>$this->request->getVar('can'),
            'precio'=>$this->request->getVar('peu'),
        ];
        $datos2=array(
            'stock'=>$tota
        );
        
        $compra->update($id,$datos);
        $pro->update($idpro,$datos2);

        return $this->response->redirect(base_url('/ComprasController/index'));
    }
}
