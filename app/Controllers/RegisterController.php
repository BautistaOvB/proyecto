<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Usuarios_model;

class RegisterController extends BaseController
{
    public function index()
    {   echo view('Views\header.php');
        echo view('Views\Register.php');
        echo view('Views\footer.php');
    }

    public function register()
    {
        helper(['form']);
        $session = session();
        $model = new Usuarios_model();

        $nombre = $this->request->getVar('nombre');
        $apellido = $this->request->getVar('apellido');
        $usuario = $this->request->getVar('usuario');
        $email = $this->request->getVar('email');
        $password->this->request->getVar('password');

        /** Para verificar que el usuario no coincida con alguno ya existente*/
        $exists = $model->where('usuario', $usuario)
                        ->orWhere('email', $email)
                        ->first();

        if($exists){
            $session->setFlashdata('msg', 'Mal ahí, el usuario ya está registrado (.-.)');
            return redirect()->to('/Register');
        }

        /** Guardamos el usuario */
        $data = [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'usuario' => $usuario,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'perfil_id' => 2,
            'baja' => 0;
        ];

        $model->insert($data);

        $session->setFleshdata('msg', '¡Bien muchacho, ya estás registrado!');
        return redirect()->to('/Home');
    }

}