<?php
namespace App\Controllers;

use App\Models\usuario_Model;
use CodeIgniter\Controller;

class UsuariosController extends BaseController
{
    public function index()
    {
        $model = new usuario_Model();
        $data['usuarios'] = $model->where('baja', 'NO')->findAll();

        echo view('Views\header.php');
        echo view('Views\usuarios\index.php', $data);
        echo view('Views\footer.php');
    }

    public function create()
    {
        echo view('Views\header.php');
        echo view('Views\usuarios\create.php');
        echo view('Views\footer.php');
    }

    public function store()
    {
        $model = new usuario_Model();

        $data = [
            'nombre' => $this->request->getVar('nombre'),
            'apellido' => $this->request->getVar('apellido'),
            'usuario' => $this->request->getVar('usuario'),
            'email' => $this->request->getVar('email'),
            'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
            'perfil_id' => $this->request->getVar('perfil_id'),
            'baja' => $this->request->getVar('baja', FILTER_SANITIZE_STRING) ?: 'NO'
        ];

        $model->insert($data);
        return redirect()->to('administrador\usuarios');
    }

    public function edit($id)
    {
        $model = new usuario_Model();
        $data['usuario'] = $model->find($id);

        echo view('Views\header.php');
        echo view('Views\usuarios\edit.php', $data);
        echo view('Views\footer.php');
    }

    public function update($id)
    {
        $model = new usuario_Model();

        $data = [
            'nombre' => $this->request->getVar('nombre'),
            'apellido' => $this->request->getVar('apellido'),
            'usuario' => $this->request->getVar('usuario'),
            'email' => $this->request->getVar('email'),
            'perfil_id' => $this->request->getVar('perfil_id'),
            'baja' => $this->request->getVar('baja', FILTER_SANITIZE_STRING)
        ];

        if ($this->request->getVar('pass')) {
            $data['pass'] = password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT);
        }

        $model->update($id, $data);
        return redirect()->to(view('Views\header.php') . view('Views\administrador\administrador\usuarios.php') . view('Views\footer.php'));
    }

    public function delete($id)
    {
        $model = new usuario_Model();
        $model->update($id, ['baja' => 'SI']);
        return redirect()->to(view('Views\header.php') . view('Views\administrador\administrador\usuarios.php') . view('Views\footer.php'));

    }

    public function baja()
    {
        $model = new usuario_Model();
        $data['usuarios'] = $model->where('baja', 'SI')->findAll();

        echo view('Views\header.php');
        echo view('Views\usuarios\baja.php', $data);
        echo view('Views\footer.php');
       
    }

    public function alta($id)
    {
        $model = new usuario_Model();
        $model->update($id, ['baja' => 'NO']);
        return redirect()->to(view('Views\header.php') . view('Views\administrador\usuarios\baja.php') . view('Views\footer.php'));

    }

     public function formValidation()
    {
        // Validación de formulario
        $rules = [
            'nombre' => 'required|min_length[3]|max_length[50]',
            'apellido' => 'required|min_length[3]|max_length[50]',
            'usuario' => 'required|alpha_numeric|min_length[5]|max_length[20]|is_unique[usuarios.usuario]',
            'email' => 'required|valid_email|is_unique[usuarios.email]',
            'pass' => 'required|min_length[8]',
            'perfil_id' => 'required|numeric',
            'baja' => 'in_list[SI,NO]' // Ejemplo de validación de lista
        ];

        // Personalización de los mensajes de error
        $messages = [
            'usuario.is_unique' => 'El nombre de usuario ya está en uso',
            'email.is_unique' => 'El correo electrónico ya está registrado'
        ];

        if ($this->validate($rules, $messages)) {
            // Los datos del formulario son válidos, procede a guardar en la base de datos
            $model = new usuario_Model();

            $data = [
                'nombre' => $this->request->getVar('nombre'),
                'apellido' => $this->request->getVar('apellido'),
                'usuario' => $this->request->getVar('usuario'),
                'email' => $this->request->getVar('email'),
                'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
                'perfil_id' => $this->request->getVar('perfil_id'),
                'baja' => $this->request->getVar('baja', FILTER_SANITIZE_STRING) ?: 'NO'
            ];

            $model->insert($data);
            return redirect()->to('administrador/usuarios')->with('success', 'Usuario registrado correctamente');

        } else {
            // Hay errores de validación, mostrar el formulario con errores
            $data['validation'] = $this->validator; // Pasa el objeto de validación a la vista
            echo view('Views\header.php');
            echo view('Views\administrador\usuarios\create.php', $data);
            echo view('Views\footer.php');
        }
    }
}
