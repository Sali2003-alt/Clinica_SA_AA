<?php
namespace App\Models;

use CodeIgniter\Model;

class CitaModel extends Model
{
    protected $table = 'public.cita';
    protected $primaryKey = 'id_cita';
    protected $allowedFields = ['fecha_cita', 'hora_cita', 'estado', 'motivo', 'fk_paciente', 'fk_dentista'];
    protected $returnType = 'array';
}
