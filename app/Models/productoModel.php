<?php
namespace App\Models;
use CodeIgniter\Model;

class productoModel extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id_prod';
    protected $allowedFields = ['id_prod', 'nombre', 'descripcion', 'precio', 'imagen', 'categoria'];
    
    public function obtener_productos()
    {
        return $this->findAll();
    }
}