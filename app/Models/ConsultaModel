<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultaModel extends Model
{
    protected $table = 'consultas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'email', 'mensaje', 'fecha'];



    public function obtenerConsultas()
    {
        return $this->findAll();
    }

}
