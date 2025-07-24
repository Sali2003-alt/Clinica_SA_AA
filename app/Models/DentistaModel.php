<?php
namespace App\Models;

use CodeIgniter\Model;

class DentistaModel extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'public.dentista';

    // Clave primaria de la tabla
    protected $primaryKey = 'id_dentista';

    // Campos que se pueden insertar o actualizar mediante el modelo
    protected $allowedFields = [
        'nombre',
        'especialidad',
        'telefono',
        'email',
        'estado',
        'fk_login'  // Campo que vincula al dentista con un usuario de login
    ];

    // Devuelve los resultados como arrays asociativos
    protected $returnType = 'array';

    // Reglas de validación para los datos recibidos
    protected $validationRules = [
        'nombre' => 'required|string|max_length[100]',
        'email' => 'valid_email'
    ];

    // Puedes agregar mensajes personalizados para las validaciones (opcional)
    protected $validationMessages = [
        'nombre' => [
            'required' => 'El nombre es obligatorio',
            'max_length' => 'El nombre no puede exceder 100 caracteres'
        ],
        'email' => [
            'valid_email' => 'Debe ingresar un correo electrónico válido'
        ]
    ];
}
