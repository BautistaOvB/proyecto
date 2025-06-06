<?php
namespace app\Models;
use CodeIgniter\Model;

class Productos_Model extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id_prod';
    protected $allowedFields = ['id_prod', 'nombre', 'descripcion', 'precio', 'imagen', 'categoria'];
    
    public function getProductos()
    {
        return $this->findAll();
    }
}