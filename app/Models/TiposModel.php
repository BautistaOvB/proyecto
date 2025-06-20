<?php

namespace App\Models;

use CodeIgniter\Model;

class TiposModel extends Model {
    protected $table = 'tipos_envios';
    protected $primaryKey = 'tipo_envio_id';
    protected $allowedFields = [
        'nombre','descripcion', 'precio', 
        'salidas_diarias', 'peso_max', 'dimension_max',
         'distancia',"activo","tiempo_estimado"
    ];

    // Sobrescribir el método delete para baja lógica
    public function delete($tipo_envio_id = null, $purge = false) {
        if ($tipo_envio_id !== null) {
            $data = ['activo' => false];
            return $this->update($tipo_envio_id, $data);
        }

        return false;
    }

    
    
    // Método para restaurar productos
    public function restore($tipo_envio_id = null) {
        if ($tipo_envio_id!== null) {
            $data = ['activo' => true];
            return $this->update($tipo_envio_id, $data);
        }

        return false;
    }

    protected $validationRules = [
        'nombre' => 'required',
        'precio' => 'required|numeric',
        // Agrega más reglas de validación según tus necesidades
    ];

    protected $validationMessages = [
        'nombre' => [
            'required' => 'El nombre del envio es obligatorio.'
        ],
        'precio' => [
            'required' => 'El precio del producto es obligatorio.',
            'numeric' => 'El precio debe ser un valor numérico.'
        ],
        // Agrega mensajes de validación personalizados según tus necesidades
    ];
    // Método para obtener productos no eliminados
    public function getActiveProducts() {
        return $this->where('activo', true)->findAll();
    }

    // Método para obtener productos eliminados
    public function getInactiveProducts() {
        return $this->where('activo', false)->findAll();
    }
    
    public function obtener_productos() {
        return $this->findAll();
    }
    public function updateStock($tipo_envio_id, $salidas_diarias)
    {
        $this->set('salidas_diarias', $salidas_diarias)
             ->where('tipo_envio_id', $tipo_envio_id)
             ->update();
    }
    

}
