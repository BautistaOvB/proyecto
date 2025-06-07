<?php
namespace app\Models;
use CodeIgniter\Model;

class Productos_Model extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id_prod';
    protected $allowedFields = ['id_prod', 'nombre', 'imagen', 'categoria_id', 'precio', "precio_vta", "stock", "stock_min", "eliminado"];
    
    public function getBuilderProductos()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('productos');
        $builder->select('*');
        $builder->join('categorias', 'categorias.id = productos.categoria_id' );

        return $builder;
    }

    public function getProductos($id =null)
    {
        $builder = $this->getBuilderProductos();
        $builder->where('productos.id', $id);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function updateStock($id = null, $stock_actual = null)
    {
        $builder = $this->getBuilderProductos();
        $builder->where('productos-id', $id);
        $builder->set('productos.stock', $stock_actual);
        $builder->update();
    }
}