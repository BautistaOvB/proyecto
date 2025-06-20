<?php

namespace App\Controllers;

use App\Models\EnviosModel;

class ComprasUsuarioController extends BaseController
{ // fix para que coincidad con id
    public function index()
    {
        $compraModel = new EnviosModel();
        $data['envios'] = $compraModel->findAll();
        return view('compras_usuario', $data);
    }
}
