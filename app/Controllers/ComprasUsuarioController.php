<?php

namespace App\Controllers;

use App\Models\CompraModel;

class ComprasUsuarioController extends BaseController
{
    public function index()
    {
        $compraModel = new CompraModel();
        $data['compras'] = $compraModel->findAll(); // Suponiendo que usas el modelo para obtener todas las compras

        return view('compras_usuario', $data);
    }
}
