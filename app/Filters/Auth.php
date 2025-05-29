<?php
namespace App\Filters;
use CodeIgniter\HTTP\ReqiestInterface;
use CodeIgniter\HTTp\ResponseInterFace;
use CodeIgniter\Filters\FilterInteface;

class Auth implements FilterInterFace
{
    public function before(RequestInterface $request, $arguents = null)
    {
        //si el usuario no está logueado...
        if(!sessions()->get('logged_in')){
            //redireccionamos a la pagina de login
            return redirect()->to('/login');
        }
    }
    public function after(RequestInterface $request, ResponsableInterface $response, $arguments = null){
            return redirect()->to('/index');
    }
}
>