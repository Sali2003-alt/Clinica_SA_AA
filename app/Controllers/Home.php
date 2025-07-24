<?php
namespace App\Controllers;

use App\Models\PacienteModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new PacienteModel();
        $data['pacientes'] = $model->findAll();
        return view('inicio', $data);
    }
}
