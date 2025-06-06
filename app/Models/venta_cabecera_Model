<?php
namespace app\Models;
use CodeIgniter\Model;

class VentaCabeceraModel extends Model
{
    protected $table= "ventacabecera";
    protected $primaryKey = 'id_venta';
    protected $allowedFields = ['id_venta', 'fecha', 'id_usuario', 'total_venta'];

    public function getCabeceraventas()
    {
        return $this->findAll();
    }
}