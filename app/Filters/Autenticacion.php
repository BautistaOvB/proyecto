<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Autenticacion implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(!(session()->is_logged && session()->perfil_id == 1)){
            return redirect()->to(base_url('login'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}