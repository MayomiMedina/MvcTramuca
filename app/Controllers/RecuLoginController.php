<?php

namespace App\Controllers;
use App\Models\ModelAdminUsu;
use App\Controllers\BaseController;

class RecuLoginController extends BaseController
{
    public function index()
    {
        return view('recu/restauracion');
    }
    public function nuevo(){
        $recu=new ModelAdminUsu();

        $usu=$this->request->getVar('usuario');
        $contra=$this->request->getVar('contrase');
        $contra2=$this->request->getVar('contrase2');

        $dodo=$recu->select('idusu')
                    ->where('usuario',$usu)
                   ->first();
        $datos=[
            'contra'=>$contra
        ];

        if(empty($dodo)){
            return $this->response->redirect(base_url('/RecuLoginController/index'));
        }else{
            if($contra==$contra2){
                $recu->update($dodo['idusu'],$datos);
                return $this->response->redirect(base_url('/home'));
            }else{
                return $this->response->redirect(base_url('/RecuLoginController/index')); 
            }
        }
        
    }
}
