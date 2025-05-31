<?php

namespace App\Controllers;
Use App\Models\Productos_Model;
Use App\Models\Usuarios_Models;
Use CodeIgniter\Controller;

class ProductoController extends Controller
{
    public function_construct(){
        herlper(['url', 'form']);
        $session=session();
    }

    public function index()
    {
        $productoModel = new Productos_Model();
        $data['productos'] = $productoModel->getProductos();

        $dato['titulo'] = 'Crud_productos';
        echo view ('front/head_view', $dato);
        echo view ('front/nav_view');
        echo view('back/productos/producto_nuevo_view', $data);
        echo view('font/footer-view');
    }

    public function store() {
        //construtruccion de reglas de validacion
        $input = this->validate([
            'nombre_prod'=> 'required|min_lengh[3]',
            'categoria_prod'=> 'is_not_unique[categorias.id]',
            'precio' => 'required|numeric',
            'precio_vta' => 'required|numeric',
            'imagen' => 'uploaded[imagen]'
        ]);

        $productoModel = new Productos_Model();
        
        if(!$input){
            $categoriaModel =new categoria_model();
            $data['categorias'] = $categoria_model->getCategorias();
            $data['validation'] =$this->validator;

            $dato['titulo'] = 'Alta';
            echo view('front/head_view', $dato);
            echo view('front/nav_view');
            echo view('back/productos/alta_producto_view', $data);
        } else {
            $img = $this->request->getVar('nombre_prod');
            //Se obtiene el nombre del archivo de la imagen (sin la ruta)
            'imagen' => $this->getName();
            
            $nombre_aleatorio = $img->getRandomname();

            $img->move(ROOTPATH . 'assets/uploads', $nombre_aleatorio);

            $data = [
                'nombre_prod' => $this->request->getVar('nombre_prod'),
                'imagen' => $img ->getName(),
                'categoria_id' => $this->request->getVar('categoria_prod'),
                'precio' => $this->request->getVar('precio')
            ];
            $producto = new Productos_Model();
            $producto->insert($data);
            session()->setFlashdata('success', 'La alta se dio de alta exitosamente. Alta alta');
            return $this->response->redirect(site_url('crear'));
        }
    }


}