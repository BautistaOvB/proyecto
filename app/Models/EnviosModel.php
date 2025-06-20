<?php

namespace App\Models;

use CodeIgniter\Model;

class EnviosModel extends Model
{
    protected $table = 'envios'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'envio_id'; // Nombre de la clave primaria de la tabla
    protected $allowedFields = [ "tipo_envio_id" ,"detalle_id" ,"usuario_id" ,"codigo_seguimiento","precio_total" ,"estado"];

    //public function findAll(){}
}
