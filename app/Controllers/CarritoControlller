<?php

namespace app\Controllers;
use CodeIgniter\Controller;
use app\Models\VentaCabeceraModel;
use app\Models\venta_detalle_Model;
use app\Models\Usuarios_model;

class CarritoController extends BaseController
{
    public function _construct()
    {
        helper(['form', 'url', 'cart']);
        $cart = \Config\Services::cart();
        $session = session();
    }

    public function eliminar_item()
    {
        $cart = \Config\Services::cart();
        $cart->remove($rowid);
        return redirect()->to(base_url('muestro'));
    }

    public function add() {
        $cart = \Config\Services::cart();
        $request = \Config\Services::request();

        $cart->insert(array(
            'id' => $request->getPost('id'),
            'qty' => 1,
            'name' => $request->getPost('name'),
            'price' => $request->getPost('price'),
            'imagen' => $request->getPost('imagen')
        ));

        return redirect()->back()->withImput();
    }

    public function actualiza_carrito()
    {
        $cart = \Config\Services::Cart();
        $request = \Config\Services::request();
        $cart->update(array(
            'id' =>$request->getPost('id'),
            'qty' => 1,
            'price' => $request->getPost('precio_Vta'),
            'name' => $request->getPost('nombre_prod'),
            'imagen' => $request->getPost('imagen')
        ));
        return redirect()->back()->withInput();
    }
}
