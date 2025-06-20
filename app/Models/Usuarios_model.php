<?php
namespace App\Models;
use CodeIgniter\Model;

class Usuarios_model extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'Usuario_Id';
#    $protected useAutoIncrement = true;
#    $protected returnType = 'array';
    protected $allowedFields = ['Usuario_Id','Nombre', 'Apellido', 'Email', 'Usuario', 'pass', 'perfil_id', 'baja'];

    public function getUsuarios()
    {
        return $this->findAll();
    }
}