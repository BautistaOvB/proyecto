<?php

namespace App\Controllers;

use App\Models\VentaModel;
use App\Models\ProductoModel;
use CodeIgniter\Controller;

class VentasAdminController extends Controller
{
    public function index()
    {
        $productoModel = new ProductoModel();
        $data['productos'] = $productoModel->getActiveProducts();

        $ventaModel = new VentaModel();
        $data['ventas'] = $ventaModel->findAll();

        echo view('ventas_admin', $data);
    }

    public function guardarVenta()
    {   
        if ($this->request->getMethod() === 'post') {
            $ventaModel = new VentaModel();

            $data = [
                'id_cliente' => session()->get('id_usuario'),
                'fecha_venta' => date('Y-m-d H:i:s'),
                'subtotal' => ($this->request->getPost('subtotal') * 1000),
            ];

            try {
                $ventaModel->insert($data);
                return redirect()->to(base_url('/productos'))->with('success', 'Venta realizada con éxito.');
            } catch (\Exception $e) {
                return "Error al insertar la venta: " . $e->getMessage();
            }
        } else {
            return "Error: Método no permitido";
        }
    }

    public function cargarVentas()
    {
        $ventaModel = new VentaModel();
        $ventas = $ventaModel->findAll();
        return $this->response->setJSON(['ventas_admin' => $ventas]);
    }

    public function indexUser()
    {
        $ventaModel = new VentaModel();
        $session = session();
        $datosCompra['compras']   = $ventaModel->where('id_cliente', $session->get('id_usuario'))->join("usuarios", "usuarios.id_usuario = historial_ventas.id_cliente")->findAll();
    
        echo view ('compras_usuario', $datosCompra);
    }



}