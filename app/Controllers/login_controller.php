<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\usuario_Model;
use App\controllers\usuario_controller;

class Login_controller extends BaseController
{
    public function index()
    {
        helper(['form','url']);

        $data['titulo'] = 'Login';

        echo view('header', $data); 
        echo view('login'); 
        echo view('footer');
    } 

    public function auth()
    {
        $session = session(); 
        $model = new usuario_Model(); 

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('pass');
        
        $data = $model->where('email', $email)->first(); 
        if($data){
            $pass = $data['pass'];
            $ba = $data['baja'];
            if ($ba == 'SI'){
                $session->setFlashdata('msg', 'Usuario dado de baja');
                return redirect()->to('login');
            }
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'id_usuario' => $data['id_usuario'],
                    'nombre' => $data['nombre'],
                    'apellido'=> $data['apellido'],
                    'usuario' =>  $data['usuario'],
                    'email' => $data['email'],
                    'perfil_id'=> $data['perfil_id'],
                    'is_logged' => TRUE  // Establecer 'is_logged' como TRUE cuando el usuario inicia sesión
                ];  
                $session->set($ses_data);
                    
                session()->setFlashdata('msg', '¡Bienvenido!');
                return redirect()->to('index');
                
            }else{  
                $session->setFlashdata('msg', 'Password Incorrecta');
                return redirect()->to('login');
            }   
        }else{
            $session->setFlashdata('msg', 'No Existe el Email o es Incorrecto');
            return redirect()->to('/login');
        } 
    }
    public function login()
        {
        $model = new UsuarioModel();
        $usuario = $this->request->getVar('usuario');
        $pass = $this->request->getVar('pass');

    $user = $model->where('usuario', $usuario)->first();

    if ($user && password_verify($pass, $user['pass']) && $user['baja'] == 'NO') {
        // Usuario autenticado y no dado de baja
        // Guardar datos del usuario en la sesión
        session()->set('usuario', $user);
        return redirect()->to('/dashboard');
    } else {
        // Autenticación fallida
        return redirect()->to('/login')->with('error', 'Usuario o contraseña incorrectos, o el usuario está dado de baja.');
    }
}



    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
