<?php

namespace App\Controllers;

use App\Models\CitaModel;
use App\Models\PacienteModel;
use App\Models\DentistaModel;
use CodeIgniter\Controller;

class Cita extends Controller
{
    public function listar()
    {
        $model = new CitaModel();
        $data['citas'] = $model->findAll();

        $modelPaciente = new PacienteModel();
        $modelDentista = new DentistaModel();

        $data['pacientes'] = $modelPaciente->findAll();
        $data['dentistas'] = $modelDentista->findAll();

        return view('cita_list', $data);
    }

    public function agregar()
    {
        $modelPaciente = new PacienteModel();
        $modelDentista = new DentistaModel();

        $data['pacientes'] = $modelPaciente->findAll();
        $data['dentistas'] = $modelDentista->findAll();

        return view('cita_form', $data);
    }

    public function guardar()
    {
        $model = new CitaModel();

        // Validaciones básicas (puedes añadir reglas en el modelo)
        if (!$this->validate([
            'fecha_cita' => 'required|valid_date',
            'hora_cita' => 'required',
            'estado' => 'required',
            'motivo' => 'required',
            'fk_paciente' => 'required|integer',
            'fk_dentista' => 'required|integer',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'fecha_cita' => $this->request->getPost('fecha_cita'),
            'hora_cita' => $this->request->getPost('hora_cita'),
            'estado' => $this->request->getPost('estado'),
            'motivo' => $this->request->getPost('motivo'),
            'fk_paciente' => $this->request->getPost('fk_paciente'),
            'fk_dentista' => $this->request->getPost('fk_dentista'),
        ];

        $model->insert($data);

        return redirect()->to(base_url('cita_listar'))->with('mensaje', 'Cita guardada correctamente');
    }

    public function eliminar($id = null)
    {
        if ($id === null) {
            return redirect()->to(base_url('cita_listar'))->with('error', 'ID inválido');
        }

        $model = new CitaModel();
        $cita = $model->find($id);

        if (!$cita) {
            return redirect()->to(base_url('cita_listar'))->with('error', 'Cita no encontrada');
        }

        $model->delete($id);

        return redirect()->to(base_url('cita_listar'))->with('mensaje', 'Cita eliminada correctamente');
    }

    public function editar($id = null)
    {
        if ($id === null) {
            return redirect()->to(base_url('cita_listar'))->with('error', 'ID inválido');
        }

        $model = new CitaModel();
        $cita = $model->find($id);

        if (!$cita) {
            return redirect()->to(base_url('cita_listar'))->with('error', 'Cita no encontrada');
        }

        $modelPaciente = new PacienteModel();
        $modelDentista = new DentistaModel();

        $data['cita'] = $cita;
        $data['pacientes'] = $modelPaciente->findAll();
        $data['dentistas'] = $modelDentista->findAll();

        return view('cita_editar', $data);
    }

    public function actualizar($id = null)
    {
        if ($id === null) {
            return redirect()->to(base_url('cita_listar'))->with('error', 'ID inválido');
        }

        if (!$this->validate([
            'fecha_cita' => 'required|valid_date',
            'hora_cita' => 'required',
            'estado' => 'required',
            'motivo' => 'required',
            'fk_paciente' => 'required|integer',
            'fk_dentista' => 'required|integer',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new CitaModel();

        $data = [
            'fecha_cita' => $this->request->getPost('fecha_cita'),
            'hora_cita' => $this->request->getPost('hora_cita'),
            'estado' => $this->request->getPost('estado'),
            'motivo' => $this->request->getPost('motivo'),
            'fk_paciente' => $this->request->getPost('fk_paciente'),
            'fk_dentista' => $this->request->getPost('fk_dentista'),
        ];

        $model->update($id, $data);

        return redirect()->to(base_url('cita_listar'))->with('mensaje', 'Cita actualizada correctamente');
    }
}
