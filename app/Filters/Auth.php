<?php
namespace App\Filters;
use codeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(!session()->get('logged_in')){
            return redirect()->to('/login');
        }
    }
    public function after(RequestInterface $reques, ResponseInterface $response, $arguments = null){


    }
}