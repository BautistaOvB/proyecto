<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Usuarios_model;

class login_controller extends BaseController
{
    public function index()
    {
        helper(['form', 'url']);
    }

    public function auth()
    {
        $session = session(); //iniciamos el objeto session()
        $model = new Usuarios_model(); //instanciamos el modelo

        //Traemos los datos del formulario
        $email = $this->request->getVar('email'); //Correo
        $password = $this->request->getVar('pass'); //Contraseña

        $data = $model->where('email', $email)->first(); //consulta a la tabla
        if(data){
            $pass = $data['pass'];
            $ba = $data['baja'];
            if($ba == true){
                $session->setFlashdata('msg', 'usuario dado de baja');
                return redirect()->to('/');
            }
            $verify_pass =password_verify($password, $pass);
                //password_verify determina los requisitos de configuración de la contraseña
                if($verify_pass){
                    $ses_data= [
                        'id_usuario' => $data['id_usuario'],
                        'nombre' =>  $data['nombre'],
                        'apellido' => $data ['apellido'],
                        'email' => $data['email'],
                        'usuario'  => $data ['usuario'],
                        'perfil_id' => $data ['perfil_id'],
                        'logged_in' => true
                    ];

                    //Se cumple la verificacion e inicia la sesión
                    $session->set($ses_data);

                    session()->setFlashdata('msg', 'Bienvenidoooo!!!!');
                    return redirect()->to('/panel');
                
                } else{
                    $session->setFlashdata('msg', "Contraseña incorrecta -___-");
                    return redirect()->to('/login');
                }
        }else{
            $session->setFlashData('msg', 'No ingresó un email o el mismo es incorrecto');
            return redirect()->('/login');
        }
        public function logout(){
            $session = session();
            $session->destroy();
            return redirect()->to('/');
        }
    }
}