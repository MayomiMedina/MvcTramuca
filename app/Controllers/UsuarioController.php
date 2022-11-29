<?php 
namespace App\Controllers;

namespace App\Controllers;
use App\Models\Modelusua;
use App\Controllers\BaseController;

class UsuarioController extends BaseController{

    public function login2(){

        $pro=new Modelusua();
        $usu=$this->request->getVar('usuario');
        $con=$this->request->getVar('contrase');

        $vari=$pro->where('usuario',$usu)
                    ->where('contra',$con)
                    ->first();
        if($usu==$vari['usuario']){
            echo 'gg';
        }else{
            echo'ss';
        }
    }
}