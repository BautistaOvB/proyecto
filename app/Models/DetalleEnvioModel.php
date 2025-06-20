<?php

namespace App\Models;

use CodeIgniter\Model;

class DetalleEnviosModel extends Model
{
    protected $table = 'detalle_envios';
    protected $primaryKey = 'detalle_id';
    protected $allowedFields = ["informacion_envio" ,
"fecha_inicio" ,
"fecha_llegada" ,
"destinatario_nombre",
"destinatario_telefono", 
"destinatario_direccion",
"destinatario_localidad"];

    public function obtenerPedidos()
    {
        return $this->findAll();
    }

}
