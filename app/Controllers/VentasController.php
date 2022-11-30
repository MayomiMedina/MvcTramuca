<?php

namespace App\Controllers;
use App\Models\ModelVentas;
use App\Models\ModelProducto;
use App\Controllers\BaseController;

class VentasController extends BaseController
{
    public function index()
    {
        $ven=new ModelVentas();

        $datos['s']=$ven->select('tb_boleta.id_boleta,tb_boleta.id_cliente,tb_boleta.id_producto,tb_boleta.fecha,
        tb_boleta.RUC,tb_boleta.descripcion,tb_boleta.comprobante,tb_boleta.cantidad,tb_boleta.precio,
        tb_boleta.total,tb_producto.producto,tb_cliente.nombre')
         ->join('tb_producto','tb_boleta.id_producto=tb_producto.id_producto')
         ->join('tb_cliente','tb_boleta.id_cliente=tb_cliente.id_cliente')
         ->orderBy('id_boleta','ASC')
         ->findAll();
                
        return view('ventas/ventas',$datos);
    }
    public function guardar(){
        $venta=new ModelVentas();
        $pro=new ModelProducto();

        $uno=$this->request->getVar('can');
        $dos=$this->request->getVar('pre');
        $canmaspre=$uno+$dos;

        $idpro=$this->request->getVar('pro');

        $produ=$pro->select('stock')
                ->where('id_producto',$idpro)
                ->first();

        $tota=$produ['stock']-$uno;
        if($tota<0){
            ?>
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script>  
                swal("NO SE PUEDE HACER LA VENTA PORQUE NO TIENE SUFICIENTE STOCK", "", "error");  
                </script>
            <?php
            return $this->response->redirect(base_url('/VentasController/index'));
        }else{
            $datos=[
                'fecha'=>$this->request->getVar('fec'),
                'ruc'=>$this->request->getVar('ruc'),
                'descripcion'=>$this->request->getVar('des'),
                'comprobante'=>$this->request->getVar('com'),
                'id_cliente'=>$this->request->getVar('cli'),
                'id_producto'=>$this->request->getVar('pro'),                                            
                'cantidad'=>$this->request->getVar('can'),
                'precio'=>$this->request->getVar('pre'),
                'total'=>$canmaspre
            ];
            $datos2=array(
                'stock'=>$tota
            );
            $venta->insert($datos);
            $pro->update($idpro,$datos2);

        return $this->response->redirect(base_url('/VentasController/index'));
        }

        return $this->response->redirect(base_url('/VentasController/index'));
    }
    public function editar(){
        $venta=new ModelVentas();
        $pro=new ModelProducto();

        $uno=$this->request->getVar('can');
        $precio=$this->request->getVar('pre');
        $total=$uno*$precio;

        $idpro=$this->request->getVar('pro');
        $idven=$this->request->getVar('idcompra');

        $stockpro=$pro->select('stock')
                      ->where('id_producto',$idpro)
                      ->first();
        $canventas=$venta->select('cantidad')
                        ->where('id_boleta',$idven)
                        ->first();
        if($uno>$canventas['cantidad']){
            $resta=$uno-$canventas['cantidad'];
            $suma=$stockpro['stock']-$resta;
            if($suma<0){
                ?>
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script>  
                swal("NO SE PUEDE HACER LA VENTA PORQUE NO TIENE SUFICIENTE STOCK", "", "error");  
                </script>
                 <?php
                 return $this->response->redirect(base_url('/VentasController/index'));
            }
            else{
            $datostock=array(
                'stock'=>$suma
            );
            $datos=[
                'fecha'=>$this->request->getVar('fec'),
                'ruc'=>$this->request->getVar('ruc'),
                'descripcion'=>$this->request->getVar('des'),
                'comprobante'=>$this->request->getVar('com'),
                'id_cliente'=>$this->request->getVar('cli'),
                'id_producto'=>$this->request->getVar('pro'),                                            
                'cantidad'=>$this->request->getVar('can'),
                'precio'=>$this->request->getVar('pre'),
                'total'=>$total
            ];
            $pro->update($idpro,$datostock);
            $venta->update($idven,$datos);
            return $this->response->redirect(base_url('/VentasController/index'));
            }
        }
        else{
            $resta=$canventas['cantidad']-$uno;
            $restados=$stockpro['stock']+$resta;
            if($uno<0){
                ?>
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script>  
                swal("NO SE PUEDE HACER LA VENTA PORQUE NO TIENE SUFICIENTE STOCK", "", "error");  
                </script>
                 <?php
                 return $this->response->redirect(base_url('/VentasController/index'));
            }else{
            $datostock=array(
                'stock'=>$restados
            );
            $datos=[
                'fecha'=>$this->request->getVar('fec'),
                'ruc'=>$this->request->getVar('ruc'),
                'descripcion'=>$this->request->getVar('des'),
                'comprobante'=>$this->request->getVar('com'),
                'id_cliente'=>$this->request->getVar('cli'),
                'id_producto'=>$this->request->getVar('pro'),                                            
                'cantidad'=>$this->request->getVar('can'),
                'precio'=>$this->request->getVar('pre'),
                'total'=>$total
            ];
            $pro->update($idpro,$datostock);
            $venta->update($idven,$datos);
            return $this->response->redirect(base_url('/VentasController/index'));
            }
        }
    }
    public function borrar(){
        $ventas=new ModelVentas();

        $id=$this->request->getVar('id');
        $datos2=$ventas->where('id_boleta',$id)->first();

        $ventas->where('id_boleta',$id)->delete($id);
        return $this->response->redirect(base_url('/VentasController/index'));
    }
}

