<?php

namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\HTTP\Response;
use Config\Services;

class Home extends BaseController
{

    public function index() {
        return view('plantillas/plantillaLogin');
    }


    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function LogIn() : Response {
        $UsersModel = new UsersModel();
        $request = Services::request();
        $user = $UsersModel->loginUser($request->getPost('usuario'), $request->getPost('contrase'));
        if (($user ?? null) === null) {
            return $this->response->setJSON(['estado' => 'error', 'msg' => 'Credenciales incorrectas']);
        }
        return $this->response->setJSON([
            'estado' => 'success',
            'msg' => 'Iniciando sesión',
            'ruta' => base_url(((int) ($user->idcargo)) === 1 ? 'Admin':'ventas'),
            //'ruta' => base_url(((int) ($user->idcargo)) === 1 ? 'AdminUsuController':'AdminUsuController'),
        ]);        
    }
    public function login2(){
        $pro=new UsersModel();
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
