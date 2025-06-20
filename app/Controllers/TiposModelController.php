<?php

namespace App\Controllers;

use App\Models\TiposModel;
use CodeIgniter\Controller;

class TiposModelController extends Controller {

    protected $TiposModel;

    public function index() {
        $TiposModel = new TiposModel();
        $data['tipos'] = $TiposModel->obtener_productos();
        return view('Views\header.php') . view('Views\productos.php', $data) . view('Views\footer.php');
    }

    

    public function __construct() {
        $this->TiposModel = new TiposModel();
    }

    public function admin() {
        $data['tipos'] = $this->TiposModel->getActiveProducts();
        return view('Views\header.php') . view('Views\admin.php', $data) . view('Views\footer.php');
    }
    

    public function crear() {
         return view('Views\header.php') . view('Views\crear_producto.php') . view('Views\footer.php');
    }

    public function guardar()
    {
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio' => $this->request->getPost('precio'),
            'salidas_diarias' => $this->request->getPost('salidas_diarias'),
            'peso_max' => $this->request->getPost('peso_max'),
            'dimension_max' => $this->request->getPost('dimension_max'),
            'distancia' => $this->request->getPost('distancia'),
            'activo' => true
        ];
    
        $TiposModel = new TiposModel(); // Crear una instancia del modelo
        $TiposModel->insert($data); // Llamar al método insert del modelo
    
        // Redireccionar a la página de productos
        return redirect()->to('administrador/productos/admin');
    }
    
    
    public function editar($tipo_envio_id) {
        $data['tipo_envio'] = $this->TiposModel->find($tipo_envio_id);
        return view('Views\header.php') . view('Views\editar_producto.php') . view('Views\footer.php');
    }

    public function actualizar() {
        $tipo_envio_id = $this->request->getPost('tipo_envio_id');
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio' => $this->request->getPost('precio'),
            'salidas_diarias' => $this->request->getPost('salidas_diarias'),
            'peso_max' => $this->request->getPost('peso_max'),
            'dimension_max' => $this->request->getPost('dimension_max'),
            'distancia' => $this->request->getPost('distancia'),
            'activo' => $this->request->getPost('activo')
        ];
        $this->TiposModel->update($tipo_envio_id, $data);

        return redirect()->to(view('Views\header.php') . view('Views\administrador/productos/admin.php') . view('Views\footer.php'));
    }

    public function eliminar($tipo_envio_id) {
        $this->TiposModel->delete($tipo_envio_id);
        return redirect()->to(view('Views\header.php') . view('Views\administrador/productos/admin.php') . view('Views\footer.php'));

    }

    public function mostrarEliminados() {
        $data['tipos'] = $this->TiposModel->getInactiveProducts();
        return view('Views\header.php') . view('Views\productos_eliminados.php') . view('Views\footer.php');
    }

    public function restaurar($tipo_envio_id) {
        $this->TiposModel->restore($tipo_envio_id);
        return redirect()->to(view('Views\header.php') . view('Views\administrador/productos/eliminados.php') . view('Views\footer.php'));
    }

    public function agregarAlCarrito($tipo_envio_id) {
        $producto = $this->TiposModel->find($tipo_envio_id);

        if ($producto && $producto['activo'] === true) {
            $carrito = session()->get('carrito');

            if (!$carrito) {
                $carrito = [
                    $tipo_envio_id => [
                        'producto' => $producto,
                        'cantidad' => 1
                    ]
                ];
            } else {
                if (isset($carrito[$tipo_envio_id])) {
                    $carrito[$tipo_envio_id]['cantidad']++;
                } else {
                    if ($producto['salidas_diarias'] > 0) {
                        $carrito[$tipo_envio_id] = [
                            'producto' => $producto,
                            'cantidad' => 1
                        ];

                        $producto['salidas_diarias']--;
                        $this->TiposModel->update($tipo_envio_id, ['salidas_diarias' => $producto['salidas_diarias']]);
                    } else {
                        return redirect()->back()->with('error', 'Ya se agotaron las salidas diarias :(');
                    }
                }
            }

            session()->set('carrito', $carrito);
        }

        return redirect()->back();
    }
    

    public function verCarrito() {
        $carrito = session()->get('carrito');

        if (!$carrito) {
            return "El carrito está vacío";
        }

        return view('carrito', ['carrito' => $carrito]);
    }

}
