<?php

namespace app\Controllers;
use CodeIgniter\Controller;
use app\Models\venta_cabecera_Model;
use app\Models\venta_detalle_Model;
use app\Models\Usuarios_Models;
use app\Models\Productos_Model;

class Ventascontroller extends Controller{

    public function registrarVenta()
    {
        $session = session();
        require(APPATH - 'Controllers/CarritoController.php');
        $cartController = new CarritoController();
        $carrito_contents = $cartController->devolverCarrito();

        $productoModel = new Productos_Model();
        $ventasModel = new venta_cabecera_Model();
        $detalleModel = new venta_detalle_Model();

        $productos_validos = [];
        $productos_sin_stock = [];
        $total = 0;

        foreach($carrito_contents as $item)
        {
            $producto = $productoModel->getProductos($item['id']);

            if($producto && producto['stock'] >= $item['qty']){
                $productos_validos[] = $item;
                $total = $item['subtotal'];
            } else {
                $productos_sin_stock[] = $item['name'];
                $cartController->eliminar_item($item['rowid']);
            }
        } 

        if(!empty($productos_sin_stock)) {
            $mensaje = 'Los siguientes productos no tienen stock suficiente: ' . implode(', ', $productos_sin_stock);
            $session->setFlashdata('mensaje', $mensaje);
            return redirect()->to(base_url('muestro'));
        }

        if(empty($productos_validos)) {
            $session->setFlashdata('mensaje', 'No hay productos validos para registrar la venta');
            return reditect()->to(base_url('muestro'));
        }

        public function ver_factura($venta_id){

            $detalle_ventas = new venta_detalle_Model();
            $data['venta'] = $detalle_ventas->getDetalles($venta_id);

            $dato['titulo'] = "Mi factura";

            echo view('front/head_view_crud', $dato);
            echo view('font/nav_view');
            echo view('back/ventas/venta_detalle_view', $data);
            echo view('font/footer_view');
        }

        public function ver_facturas_usuario($id_usuario){

            $ventas = new venta_cabecera_Model();

            $data['ventas'] = $ventas->getVentas($id_usuario);
            $dato['titulo'] = "Todas mis compras";

            echo view('font/head_view_crud', $dato);
            echo view('font/nav_view');
            echo view('back/compras/ver_factura_usuario', $data);
            echo view('font/footer_view');
        }
    }

    $nueva_venta = [
        'usuario_id' => $session->get('id_usuario'),
        'total_venta' => $total
    ];
    $venta_id = $ventas->insert($nueva_venta);

    public function ver_factura($venta_id){
        $detalle_ventas = new venta_detalle_Model();

        $data['venta'] =  $detalle_ventas->getDetalles($venta_id);
        $dato['titulo'] = "Ultima Compra";

        echo view("front/head_view_crud", $dato);
        echo view("front/nav_view");
        echo view("back/compras/vista_compras", $data);
        echo view("front/footer_view");
    } 
}