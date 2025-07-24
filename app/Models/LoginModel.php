<?php
namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'public.login';
    protected $primaryKey = 'id_login';
    protected $allowedFields = ['email', 'contrasena'];
    protected $returnType = 'array';

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected $validationRules = [
        'email' => 'required|valid_email|max_length[100]',
        'contrasena' => 'required|min_length[6]|max_length[255]',
    ];

    protected $validationMessages = [
        'email' => [
            'required' => 'El email es obligatorio',
            'valid_email' => 'Debe ingresar un email válido'
        ],
        'contrasena' => [
            'required' => 'La contraseña es obligatoria',
            'min_length' => 'La contraseña debe tener al menos 6 caracteres'
        ]
    ];

    protected function hashPassword(array $data)
    {
        if (isset($data['data']['contrasena'])) {
            $data['data']['contrasena'] = password_hash($data['data']['contrasena'], PASSWORD_DEFAULT);
        }
        return $data;
    }
}