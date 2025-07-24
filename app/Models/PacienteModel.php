<?php
namespace App\Models;

use CodeIgniter\Model;

class PacienteModel extends Model
{
    protected $table = 'public.paciente';
    protected $primaryKey = 'id_paciente';
    protected $allowedFields = ['nombre', 'apellido', 'cedula', 'telefono', 'email', 'direccion'];
    protected $returnType = 'array';

    protected $validationRules = [
        'nombre' => 'required|string|max_length[100]',
        'apellido' => 'required|string|max_length[100]',
        'cedula' => 'required|alpha_numeric|max_length[20]',
        'telefono' => 'required|alpha_numeric|max_length[20]',
        'email' => 'valid_email',
    ];
}
