<?php
namespace App\Models;

use CodeIgniter\Model;

class HistorialClinicoModel extends Model
{
    protected $table = 'public.historial_clinico';
    protected $primaryKey = 'id_historial';
    protected $allowedFields = [
        'diagnostico',
        'tratamiento_realizado',
        'fecha',
        'observaciones',
        'fk_paciente',
        'fk_dentista'
    ];
    protected $returnType = 'array';
}
