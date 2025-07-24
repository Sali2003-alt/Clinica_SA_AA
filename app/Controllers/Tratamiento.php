<?php

namespace App\Controllers;

use App\Models\TratamientoModel;
use App\Models\PacienteModel;
use CodeIgniter\Controller;

class Tratamiento extends Controller
{
    public function listar()
    {
        $model = new TratamientoModel();
        $data['tratamientos'] = $model->findAll();

        $modelPaciente = new PacienteModel();
        $data['pacientes'] = $modelPaciente->findAll();

        return view('tratamiento_list', $data);
    }

    public function agregar()
    {
        $modelPaciente = new PacienteModel();
        $data['pacientes'] = $modelPaciente->findAll();

        return view('tratamiento_form', $data);
    }

    public function guardar()
    {
        $model = new TratamientoModel();

        if (!$this->validate([
            'nombre' => 'required|max_length[100]',
            'descripcion' => 'required',
            'costo' => 'required|decimal',
            'fecha_inicio' => 'required|valid_date',
            'fecha_fin' => 'required|valid_date',
            'fk_paciente' => 'required|integer',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'costo' => $this->request->getPost('costo'),
            'fecha_inicio' => $this->request->getPost('fecha_inicio'),
            'fecha_fin' => $this->request->getPost('fecha_fin'),
            'fk_paciente' => $this->request->getPost('fk_paciente'),
        ];

        $model->insert($data);

        return redirect()->to(base_url('tratamiento_listar'))->with('mensaje', 'Tratamiento guardado correctamente');
    }

    public function eliminar($id = null)
    {
        if ($id === null) {
            return redirect()->to(base_url('tratamiento_listar'))->with('error', 'ID inválido');
        }

        $model = new TratamientoModel();
        $tratamiento = $model->find($id);

        if (!$tratamiento) {
            return redirect()->to(base_url('tratamiento_listar'))->with('error', 'Tratamiento no encontrado');
        }

        $model->delete($id);

        return redirect()->to(base_url('tratamiento_listar'))->with('mensaje', 'Tratamiento eliminado correctamente');
    }

    public function editar($id = null)
    {
        if ($id === null) {
            return redirect()->to(base_url('tratamiento_listar'))->with('error', 'ID inválido');
        }

        $model = new TratamientoModel();
        $tratamiento = $model->find($id);

        if (!$tratamiento) {
            return redirect()->to(base_url('tratamiento_listar'))->with('error', 'Tratamiento no encontrado');
        }

        $modelPaciente = new PacienteModel();

        $data['tratamiento'] = $tratamiento;
        $data['pacientes'] = $modelPaciente->findAll();

        return view('tratamiento_editar', $data);
    }

    public function actualizar($id = null)
    {
        if ($id === null) {
            return redirect()->to(base_url('tratamiento_listar'))->with('error', 'ID inválido');
        }

        if (!$this->validate([
            'nombre' => 'required|max_length[100]',
            'descripcion' => 'required',
            'costo' => 'required|decimal',
            'fecha_inicio' => 'required|valid_date',
            'fecha_fin' => 'required|valid_date',
            'fk_paciente' => 'required|integer',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new TratamientoModel();

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'costo' => $this->request->getPost('costo'),
            'fecha_inicio' => $this->request->getPost('fecha_inicio'),
            'fecha_fin' => $this->request->getPost('fecha_fin'),
            'fk_paciente' => $this->request->getPost('fk_paciente'),
        ];

        $model->update($id, $data);

        return redirect()->to(base_url('tratamiento_listar'))->with('mensaje', 'Tratamiento actualizado correctamente');
    }
}
