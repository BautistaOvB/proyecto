<?php

namespace App\Controllers;

use App\Models\EnviosModel;
use App\Models\DetalleEnviosModel;
use App\Models\TiposModel;
use CodeIgniter\Controller;

class EnviosAdminController extends Controller
{
    public function index()
    {
        $tiposModel = new TiposModel();
        $data['productos'] = $tiposModel->getActiveProducts();

        $enviosModel = new EnviosModel();
        $data['ventas'] = $enviosModel->findAll();

        echo view('ventas_admin', $data);
    }

    public function guardarVenta()
    {   
        if ($this->request->getMethod() === 'post') {
            $enviosModel = new EnviosModel();
            $detalleModel = new DetalleEnviosModel();

            $detalleData = [
                'informacion_envio'       => $this->request->getPost('informacion_envio'),
                'fecha_inicio'            => $this->request->getPost('fecha_inicio'),
                'fecha_llegada'           => $this->request->getPost('fecha_llegada'),
                'destinatario_nombre'     => $this->request->getPost('destinatario_nombre'),
                'destinatario_telefono'   => $this->request->getPost('destinatario_telefono'),
                'destinatario_direccion'  => $this->request->getPost('destinatario_direccion'),
                'destinatario_localidad'  => $this->request->getPost('destinatario_localidad')
            ];

            $detalle_id = $detalleModel->insert($detalleData, true);

            $envioData = [
                'usuario_id'        => session()->get('usuario_id'),
                'detalle_id'        => $detalle_id,
                'tipo_envio_id'     => $this->request->getPost('tipo_envio_id'),
                'precio_total'      => $this->request->getPost('precio_total'),
                'codigo_seguimiento'=> strtoupper(bin2hex(random_bytes(4))),
                'estado'            => 'pendiente'
            ];

            try {
                $enviosModel->insert($envioData);
                return redirect()->to(base_url('/productos'))->with('success', 'Envío registrado con éxito.');
            } catch (\Exception $e) {
                return "Error al registrar el envío: " . $e->getMessage();
            }
        } else {
            return "Error: Método no permitido";
        }
    }

    public function cargarVentas()
    {
        $enviosModel = new EnviosModel();
        $ventas = $enviosModel->findAll();
        return $this->response->setJSON(['ventas_admin' => $ventas]);
    }

    public function indexUser()
    {
        $enviosModel = new EnviosModel();
        $session = session();
        $datosCompra['compras'] = $enviosModel->where('usuario_id', $session->get('usuario_id'))->findAll();

        echo view('compras_usuario', $datosCompra);
    }
}
