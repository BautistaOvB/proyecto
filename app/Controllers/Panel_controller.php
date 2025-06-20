<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Panel_controller extends BaseController
{
    public function index()
    {
        // Aquí puedes cargar vistas, obtener datos del modelo, etc.
        // Por ejemplo, cargar una vista para mostrar el panel de control.
        echo view('panel/index');
    }

    public function profile()
    {
        // Aquí puedes manejar la visualización y edición del perfil del usuario.
    }

    public function settings()
    {
        // Aquí puedes manejar la configuración de la aplicación.
    }

    // Otros métodos según las necesidades de tu aplicación.
}
