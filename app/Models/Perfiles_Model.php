<?php

namespace app\Models;
use CodeIgniter\Model;

class Perfiles_Model extends Model
{
    protected $table = 'perfiles';
    protected $primaryKey = 'id_perfil';
    protected $allowedFields = ['id_perfil', 'descripcion'];

    public function getPerfiles()
    {
        return $this->findAll();
    }
}