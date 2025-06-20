<?php

namespace app\Models;
use CodeIgniter\Model;
class Venta_Detalle_Model extends Model
{
    protected $table = 'ventaDetalle';
    protected $primaryKey = 'id_vendet';
    protected $allowedFields = ['id_vendet', "venta_id", "producto_id", "cantidad", "precio"];

    public function getVentaDetalle($id = null, $id_usuario = null){
        $db = \Config\Database::connect();
        $builder = $db->table('ventasDetalle');
        $builder = select ('*');
        $builder->join('ventasCabecera', 'ventas_cabecera.id = ventas_detalle.id_vendet');
        $builder->join('productos', 'productos.id_prod = ventas_detalle.producto_id');
        if($id != null){
            $builder->where('ventas_cabecera.id', $id);
        }

        $query = $builder->get();
        return $query->getResultArray();
        
    }

}