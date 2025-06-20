<?php

namespace App\Models;

use CodeIgniter\Model;

class usuario_Model extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'usuario_id';
    protected $allowedFields = ['nombre', 'apellido',"direccion" ,"ciudad","provincia","telefono",'email', 'pass', 'baja'];
}
