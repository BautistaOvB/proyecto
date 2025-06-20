<?php

namespace App\Controllers;

use App\Models\ProductoModel;
use CodeIgniter\Controller;

class ProductoController extends Controller {

    protected $productoModel;

    public function index() {
        $productoModel = new ProductoModel();
        $data['productos'] = $productoModel->obtener_productos();
        return view('productos', $data);
    }

    

    public function __construct() {
        $this->productoModel = new ProductoModel();
    }

    public function admin() {
        $data['productos'] = $this->productoModel->getActiveProducts();
        return view('admin', $data);
    }

    public function crear() {
        return view('header') . view('crear_producto') . view('footer');
    }

    public function guardar()
    {
        $data = [
            'nombre_prod' => $this->request->getPost('nombre'),
            'imagen' => $this->request->getPost('imagen'),
            'categoria_id' => $this->request->getPost('categoria_id'),
            'precio' => $this->request->getPost('precio'),
            'precio_venta' => $this->request->getPost('precio_venta'),
            'stock' => $this->request->getPost('stock'),
            'stock_min' => $this->request->getPost('stock_min'),
            'eliminado' => 'NO'
        ];
    
        $productoModel = new ProductoModel(); // Crear una instancia del modelo
        $productoModel->insert($data); // Llamar al método insert del modelo
    
        // Redireccionar a la página de productos
        return redirect()->to('administrador/productos/admin');
    }
    
    
    
    
    public function editar($id) {
        $data['producto'] = $this->productoModel->find($id);
        return view('header') . view('editar_producto', $data) . view('footer');
    }

    public function actualizar() {
        $id = $this->request->getPost('id');
        $data = [
            'nombre_prod' => $this->request->getPost('nombre'),
            'imagen' => $this->request->getPost('imagen'),
            'categoria_id' => $this->request->getPost('categoria_id'),
            'precio' => $this->request->getPost('precio'),
            'precio_venta' => $this->request->getPost('precio_venta'),
            'stock' => $this->request->getPost('stock'),
            'stock_min' => $this->request->getPost('stock_min'),
            'eliminado' => $this->request->getPost('eliminado')
        ];
        $this->productoModel->update($id, $data);
        return redirect()->to('administrador/productos/admin');
    }

    public function eliminar($id) {
        $this->productoModel->delete($id);
        return redirect()->to('administrador/productos/admin');
    }

    public function mostrarEliminados() {
        $data['productos'] = $this->productoModel->getInactiveProducts();
        return view('header') . view('productos_eliminados', $data) . view('footer');
    }

    public function restaurar($id) {
        $this->productoModel->restore($id);
        return redirect()->to('administrador/productos/eliminados');
    }

    public function agregarAlCarrito($id) {
        $producto = $this->productoModel->find($id);

        if ($producto && $producto['eliminado'] === 'NO') {
            $carrito = session()->get('carrito');

            if (!$carrito) {
                $carrito = [
                    $id => [
                        'producto' => $producto,
                        'cantidad' => 1
                    ]
                ];
            } else {
                if (isset($carrito[$id])) {
                    $carrito[$id]['cantidad']++;
                } else {
                    if ($producto['stock'] > 0) {
                        $carrito[$id] = [
                            'producto' => $producto,
                            'cantidad' => 1
                        ];

                        $producto['stock']--;
                        $this->productoModel->update($id, ['stock' => $producto['stock']]);
                    } else {
                        return redirect()->back()->with('error', 'No hay suficiente stock disponible para este producto.');
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
