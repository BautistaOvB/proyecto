<?php
namespace App\Controllers;

use App\Models\ConsultaModel;
use CodeIgniter\Controller;

class ConsultaController extends Controller
{
    protected $consultaModel;

    public function __construct()
    {
        $this->consultaModel = new ConsultaModel();
    }

    public function index(){
        return view('contactos');
    }
    // Método para mostrar el formulario
    public function formulario()
    {
        $data['consultas'] = $this->consultaModel->findAll();
        return view('admin_consultas', $data);
    }

    // Método para guardar la consulta
    public function guardar()
    {
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'email' => $this->request->getPost('email'),
            'mensaje' => $this->request->getPost('mensaje'),
            'fecha' => date('Y-m-d H:i:s')
        ];

        $this->consultaModel->insert($data);

        return redirect()->to('/contacto')->with('message', 'Consulta enviada correctamente.');
    }

    // Método para mostrar las consultas en el panel de administración


    public function ver($id)
{
    $consulta = $this->consultaModel->find($id);
    return view('ver_mensaje', ['consulta' => $consulta]);
}

public function eliminar($id)
{
    $this->consultaModel->delete($id);
    return redirect()->back()->with('message', 'Consulta eliminada correctamente.');
}

public function filtrar()
{
    // Obtener los parámetros del formulario de filtrado
    $nombre = $this->request->getGet('nombre');
    $email = $this->request->getGet('email');

    // Filtrar las consultas según los parámetros recibidos
    $data['consultas'] = $this->consultaModel->where('nombre', $nombre)
                                             ->where('email', $email)
                                             ->findAll();

    // Cargar la vista con las consultas filtradas
    return view('admin_consultas', $data);
}
}

