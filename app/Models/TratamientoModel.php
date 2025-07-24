<?php
namespace App\Models;

use CodeIgniter\Model;

class TratamientoModel extends Model
{
    protected $table = 'public.tratamiento';
    protected $primaryKey = 'id_tratamiento';
    protected $allowedFields = ['nombre', 'descripcion', 'costo', 'fecha_inicio', 'fecha_fin', 'fk_paciente'];
    protected $returnType = 'array';
}
